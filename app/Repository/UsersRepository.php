<?php

namespace App\Repository;
use Illuminate\Support\Facades\Hash;
use App\User;

//use Crypt;

class UsersRepository
{
    public function getAll(){

        $users = User::all();
        return $users;
    }
    public function getById($id){
        
        $user = User::find($id);
        return $user;
    }
    public function insertUser($input){

        $user = new User();
        $user->nombre = $input['nombre'];
        $user->username = $input['username'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();
        return $user;
    }
    public function updateUser($id,$input){

        $user = User::find($id);
        $user->nombre = $input['nombre'];
        $user->apellidos = $input['username'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();
    }
    public function deleteUser($id){

        $user = User::find($id);
        $user->delete();
    }
}