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
        $partido = Partido::with(['faseDetalle','equipoHome','equipoVisit'])->where('id', $id_partido)->get();

        return response()->json(['partido'=>$partido],200);
    }
}
