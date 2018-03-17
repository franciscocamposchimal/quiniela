<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\FasesDetalle;
use App\Partido;

class PartidoController extends Controller
{
    public function getAllPartidos()
    {
        $partidos = FasesDetalle::with(['fase' => function ($query){
            $query->select(['id', 'name']);
        },'partido.equipoHome.equipo' => function ($query){
            $query->select(['id', 'name']);
        },'partido.equipoVisit.equipo' => function ($query){
            $query->select(['id', 'name']);
        }
        ])->get();

        return response()->json(['partidos'=>$partidos],200);
    }

    public function putPartido(Request $request, $id_partido)
    {
        /*$partido = FasesDetalle::with(['fase' => function($query){
            $query->select(['home', 'visit', 'empate']);
        }])->where('id', 1);*/
        $partido = FasesDetalle::select('home', 'visit', 'empate')->where('id', $id_partido)->get();

        $grupo_detalle = FasesDetalle::with(['partido.equipoVisit' => function ($query){
            $query->select(['pj', 'pg', 'e', 'pp', 'gf', 'gc', 'pts']);
        }])->get();

        return response()->json(['partido'=>$partido, 'grupo'=>$grupo_detalle],200);
    }
}
