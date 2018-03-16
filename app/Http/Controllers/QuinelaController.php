<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\User;

class QuinelaController extends Controller
{
    public function getAll($id){
        $quinielasUser = User::with('quinelas.partido.equipoVisit.equipo','quinelas.partido.equipoVisit.grupo','quinelas.partido.equipoHome.equipo','quinelas.partido.equipoHome.grupo')->where('id', $id)->get();

        /*$users = App\User::with(['posts' => function ($query) {
            $query->where('title', 'like', '%first%');
        }])->get();*/
        return response()->json(['quinielas_user'=>$quinielasUser],200);
    }
}
