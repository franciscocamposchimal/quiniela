<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Partido;
use App\Quinela;

class AuthController extends Controller
{
    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]);
            //$user = User::where('username', $request->username)->select(['id', 'name', 'username', 'email'])->first();
            $user = User::select(['id', 'name', 'username', 'email'])->withCount(['quinelas AS wins' => function($query){
                $query->where('win', '=', true);
            }])->where('username', $request->username)->first();

            $quinielas = User::select('id', 'name')->withCount(['quinelas AS win' => function ($query){
                $query->where('win', '=', true);
            }])->withCount(['quinelas AS no_win' => function ($query){
                $query->Where('home', '=', true)
                ->orWhere('visit', '=', true)
                ->orWhere('empate', '=', true);
            }])->having('no_win_count', '>', 0)->orderBy('win_count', 'desc')->get();

            if($user->wins_count > 0){
                $array_ranking = json_decode($quinielas);
                $user_id = $user->id;
                $posicion_ranking;
                foreach($array_ranking as $index => $value){
                        if($value->id == $user_id){
                            $posicion_ranking = $index + 1;
                        }
                }
                $user->posicion_ranking = $posicion_ranking;
            }

        } catch (ValidationException $e) {
            return $e->getResponse();
        }

        try {
            // Attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt(
                $this->getCredentials($request)
            )) {
                return $this->onUnauthorized();
            }
        } catch (JWTException $e) {
            // Something went wrong whilst attempting to encode the token
            return $this->onJwtGenerationError();
        }

        // All good so return the token
        return $this->onAuthorized($token, $user);
    }

    /**
     * What response should be returned on invalid credentials.
     *
     * @return JsonResponse
     */
    protected function onUnauthorized()
    {
        return new JsonResponse([
            'message' => 'invalid_credentials'
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * What response should be returned on error while generate JWT.
     *
     * @return JsonResponse
     */
    protected function onJwtGenerationError()
    {
        return new JsonResponse([
            'message' => 'could_not_create_token'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * What response should be returned on authorized.
     *
     * @return JsonResponse
     */
    protected function onAuthorized($token, $user)
    {
        return new JsonResponse([
            'message' => 'token_generated',
            'user' => $user,
            'data' => [
                'token' => $token,
            ]
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('username', 'password');
    }

    /**
     * Invalidate a token.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteInvalidate()
    {
        $token = JWTAuth::parseToken();

        $token->invalidate();

        return new JsonResponse(['message' => 'token_invalidated']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\Response
     */
    public function patchRefresh()
    {
        $token = JWTAuth::parseToken();

        $newToken = $token->refresh();

        return new JsonResponse([
            'message' => 'token_refreshed',
            'data' => [
                'token' => $newToken
            ]
        ]);
    }
    public function getUserData()
    {
        return new JsonResponse([
            'message' => 'authenticated_user',
            'data' => JWTAuth::parseToken()->authenticate()
        ]);
    }

    /**
     * Get all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUsers()
    {
        $user = JWTAuth::parseToken()->authenticate();
        if($user->role == 1){
            $user = User::all();
            return response()->json(['users'=>$user],200);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }

    /**
     * Get authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser($id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        if($user->role == 1){
            $user = User::find($id);
            return response()->json(['user'=>$user],200);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }

    /**
     * Create a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {
        try{
            $this->validate($request, [
                'name' => 'required|regex:/^([A-Za-z]+$)?([A-Za-z]\s[A-Za-z]+$)?/|max:255',
                'username' => 'required|alpha_dash|max:255',
                'email' => 'email|max:255'
            ]);
            $user = JWTAuth::parseToken()->authenticate();
            if($user->role == 1){
                $partidos = Partido::all();

                $pass = str_random(8);
                $newUser = new User();
                $newUser->name = $request['name'];
                $newUser->username = $request['username'];
                $newUser->email = $request['email'];
                $newUser->password = Hash::make($pass);
                $newUser->pass = $pass;
                $newUser->role = 2;
                $newUser->remember_token = str_random(10);
                $newUser->save();
                foreach($partidos as $partido){
                    $quinela = Quinela::insert([
                        'home'=>false, 
                        'visit'=>false, 
                        'empate'=>false,
                        'id_user'=>$newUser->id, 
                        'id_partido'=>$partido->id,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')]);
                    }
                return response()->json(['user'=>$newUser,'password'=>$pass],201);
                return response()->json(['user'=>'valido'],201);
            }else{
                return response()->json(['error'=>'Unauthorized'],401);
            }
        }
        catch(ValidationException $e){
            return response()->json(['error'=>'No valido o usuario existente'],500);
        }
    }
    /**
     * Update user.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request,$id)
    {
        try{
            $this->validate($request, [
                'name' => 'required|regex:/^([A-Za-z]+$)?([A-Za-z]\s[A-Za-z]+$)?/|max:255',
                'username' => 'required|alpha_dash|max:255',
                'email' => 'email|max:255'
            ]);
            
            $user = JWTAuth::parseToken()->authenticate();
            if($user->role == 1){
                $userUpdated = User::find($id);
                $userUpdated->name = $request['name'];
                $userUpdated->username = $request['username'];
                $userUpdated->email = $request['email'];
                $userUpdated->save();
                return response()->json(['user'=>$userUpdated],200);
            }else{
                return response()->json(['error'=>'Unauthorized'],401);
            }
        }
        catch(ValidationException $e){
            return response()->json(['error'=>'No valido o datos existentes'],500);
        }
    }
    /**
     * Reset password.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        if($user->role == 1){
            $pass = $request['password'];
            $userReset = User::find($id);
            $userReset->password = Hash::make($pass);
            $userReset->pass = $pass;
            $userReset->save();
            //$hash_pass = Hash::make($pass);
            return response()->json(['user'=>$userReset, 'password'=>$pass],201);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }
        /**
     * Delete user.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $userDeleted = User::find($id);
        if($userDeleted == null){
            return response()->json(['error'=>'Usuario no existe'],404);
        }
        if($user->role == 1 && $user->name != $userDeleted->name){
            $userDeleted->delete();
            return response()->json(['user'=>$userDeleted],200);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }
}
