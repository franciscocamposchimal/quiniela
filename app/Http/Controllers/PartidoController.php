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
        },'partido.equipoHome.grupo' =>function ($query){
            $query->select(['id', 'name']);
        },'partido.equipoHome.equipo' => function ($query){
            $query->select(['id', 'name']);
        },'partido.equipoVisit.grupo' => function ($query){
            $query->select('id', 'name');
        },'partido.equipoVisit.equipo' => function ($query){
            $query->select(['id', 'name']);
        }
        ])->get();

        return response()->json(['partidos'=>$partidos],200);
    }

    public function putPartido(Request $request, $id_partido)
    {
        $partido = Partido::with(['faseDetalle' => function ($query) use ($id_partido){
            $query->select(['home']);
        }])->where('id', $id_partido)->get();

        return response()->json(['partido'=>$partido],200);
        //,'equipoHome','equipoVisit'
    }
}
