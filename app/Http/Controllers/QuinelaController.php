<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\User;

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
}
