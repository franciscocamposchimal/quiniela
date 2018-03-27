<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\User;
use App\Quinela;
use App\Finishers;

class QuinelaController extends Controller
{
    public function getAll($id){

            $quinielasUser = User::with(['quinelas.partido.faseDetalle' => function ($query) {
                $query->select(['id', 'id_partido','id_fase']);
            }
            ,'quinelas.partido.faseDetalle.fase'
            ,'quinelas.partido.equipoVisit' => function ($query) {
                $query->select(['id','id_equipo','id_gpo']);
            }
            ,'quinelas.partido.equipoVisit.equipo' 
            ,'quinelas.partido.equipoVisit.grupo'
            ,'quinelas.partido.equipoHome' => function ($query) {
                $query->select(['id','id_equipo','id_gpo']);
            }
            ,'quinelas.partido.equipoHome.equipo'
            ,'quinelas.partido.equipoHome.grupo'])->where('id', $id)->get(['id','name','username','email']);

            return response()->json(['quinielas_user'=>$quinielasUser],200);

    }

    public function putQuinelas(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        if($user->role == 2){
            $quinielas = json_decode(json_encode($request['quinielas'],true));
            foreach ($quinielas as $quiniela) {
                
                User::with(['quinelas'=> function ($query) use ($quiniela){
                    $query->where('id_partido', $quiniela->id_partido)->update([
                                    'home' => filter_var($quiniela->home, FILTER_VALIDATE_BOOLEAN),
                                    'visit' => filter_var($quiniela->visit, FILTER_VALIDATE_BOOLEAN),
                                    'empate' => filter_var($quiniela->empate, FILTER_VALIDATE_BOOLEAN),
                                    ]);
                }])->where('id', $id)->get(['id']);
            }
            /*$quinielaUser = User::with(['quinelas'=> function ($query) use ($id_partido,$request){
                                $query->where('id_partido', $id_partido)->update([
                                                'ho[Formato Cotizaciones DW Medios (RESTAFRA).pdf](https://trello-attachments.s3.amazonaws.com/5aa176f48a661369dcb53bea/5ab99958cc778a3942382cc4/6e7deda9ef5cf6fcdf979aff4f0849ed/Formato_Cotizaciones_DW_Medios_(RESTAFRA).pdf) me' => filter_var($request['home'], FILTER_VALIDATE_BOOLEAN),
                                                'visit' => filter_var($request['visit'], FILTER_VALIDATE_BOOLEAN),
                                                'empate' => filter_var($request['empate'], FILTER_VALIDATE_BOOLEAN),
                                                ]);
                            }])->where('id', $id)->get(['id']);*/

            $quinielasUser = User::with('quinelas')->where('id', $id)->get(['id']);

            return response()->json(['partido'=>$quinielasUser],200);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }


    public function rankingQuinela()
    {
        $quinielas = User::select('id', 'name')->withCount(['quinelas' => function ($query){
            $query->where('win','=', true);
        }])->orderBy('quinelas_count', 'desc')->take(50)->get();

        return response()->json(['users'=>$quinielas], 200);
    }

    public function lastRankingQuinela()
    {
        $quinielas = User::select('id', 'name')->withCount(['quinelas AS wins' => function ($query){
            $query->where('win','=', true);
        }])->withCount(['quinelas AS false' => function ($query){
            $query->Where('home', '=', true)
                  ->orWhere('visit', '=', true)
                  ->orWhere('empate', '=', true);
        }])->having('false_count', '>',0)->orderBy('wins_count', 'asc')->take(10)->get();

        return response()->json(['last_ranking'=>$quinielas], 200);
    }

    public function finishers(Request $request)
    {
        //$finishers = Finishers::
        $user = JWTAuth::parseToken()->authenticate();
        if($user->role == 1){
            $finishers = json_decode(json_encode($request['finishers'],true));

            foreach ($finishers as $finisher) {
                
                if($finisher->place == "first_place"){
                    $newFisrtFinisher = new Finishers();
                    $newFisrtFinisher->place = $finisher->place;
                    $newFisrtFinisher->position = $finisher->position;
                    $newFisrtFinisher->id_user = $finisher->id_user;
                    $newFisrtFinisher->save();
                }elseif($finisher->place == "last_place"){
                    $newLastFinisher = new Finishers();
                    $newLastFinisher->place = $finisher->place;
                    $newLastFinisher->position = $finisher->position;
                    $newLastFinisher->id_user = $finisher->id_user;
                    $newLastFinisher->save();
                }
            }

                $findFinishers = Finishers::with(['user' => function ($query){
                    $query->select(['id', 'name']);
                }])->get();
        
                return response()->json(['finishers'=>$findFinishers], 200);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }

    public function getFinishers(){
        $user = JWTAuth::parseToken()->authenticate();
        if($user->role == 1 || $user->role == 2){
            $finishers_firstplace = Finishers::with(['user' => function ($query){
                $query->select(['id', 'name']);
            }])->orderBy('position', 'asc')->where('place', '=', 'first_place')->get();
            $finishers_lastplace = Finishers::with(['user' => function ($query){
                $query->select(['id', 'name']);
            }])->orderBy('position', 'asc')->where('place', '=', 'last_place')->get();
            
            //$finishers->ultimo = $finishers_lastplace;
            return response()->json(['first_places'=>$finishers_firstplace, 'last_place'=>$finishers_lastplace], 200);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }
}