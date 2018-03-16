<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\User;
use App\Quinela;

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

    public function putQuinela(Request $request, $id, $id_quiniela)
    {
        /*$quinielaUser = Quinela::where(function($query) use ($id, $id_quiniela){
            $query->where('id_user', $id)->where('id', $id_quiniela)->get();
        });*/
        /*if(count($quinielaUser) != 0){
            $quinielaUserUpdated->home = $request['home'];
            $quinielaUserUpdated->visit = $request['visit'];
            $quinielaUserUpdated->empate = $request['empate'];
            $quinielaUserUpdated.save();
            return response()->json(['quiniela'=>$quinielaUserUpdated],200);
        }else{
            return response()->json(['error'=>'Error al encontrar'],200);
        }*/
        return response()->json(['qui'=>$quinielaUser, 'size'=>sizeof($quinielaUser)],200);
    }

}
