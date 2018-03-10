<?php

namespace App\Http\Controllers;
use App\Repository\UsersRepository;
use App\Transformer\UserTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use Helpers;

    protected $usersRepository;
    protected $userTransformer;

    public function __construct(UsersRepository $usersRepository, UserTransformer $userTransformer){

        $this->usersRepository = $usersRepository;
        $this->userTransformer = $userTransformer; 
    }

    public function index() {
        $user = $this->usersRepository->getAll();

        $response = $this->response->item($user,new UserTransformer());
        return $response;
    }
    public function create(Request $request) {
    
        $user = $this->usersRepository->insertUser($request);

        $response = $this->response->item($user,new UserTransformer());
        return $response;
    }
}
