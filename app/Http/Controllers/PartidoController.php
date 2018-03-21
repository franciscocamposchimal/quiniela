<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\FasesDetalle;
use App\Partido;
use App\GpoDetalle;
use App\Quinela;
use App\User;

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
        $partido = Partido::find($id_partido);
        $updateHome= GpoDetalle::where('id',$partido->equipoHome->id)->first();
        $updateVisit= GpoDetalle::where('id',$partido->equipoVisit->id)->first();
        $Updatepartido = FasesDetalle::with(['fase','partido.equipoHome.equipo','partido.equipoVisit.equipo'])->where('id_partido', $id_partido)->first();
        //$UpdateQuinela = 
        //Ir por la quiniela y actualizar su valor win
        //Conseguir todos los win y hacerles order by y cortar a los 10 con limit

           if(intval($request['home']) > intval($request['visit'])){
                //$perro = "home";
                $updateHome->pj+=1;
                $updateHome->pg+=1;
                $updateHome->gf+= intval($request['home']);
                $updateHome->gc+= intval($request['visit']);
                $updateHome->pts+= 3;
                $updateHome->save();

                $updateVisit->pj+=1;
                $updateVisit->pp+=1;
                $updateVisit->gf+= intval($request['visit']);
                $updateVisit->gc+= intval($request['home']);
                $updateVisit->save();

                $Updatepartido->home = true;
                $Updatepartido->save();

                $UpdateQuinelas = Quinela::where('id_partido', $partido->id)->where('home', true)->get();
                foreach ($UpdateQuinelas as $quinela) {
                    $quinela->win = true;
                    $quinela->save();
                }

            }elseif(intval($request['home']) == intval($request['visit'])){
                //$perro = "empate";

                $updateHome->pj+= 1;
                $updateHome->e+= 1;
                $updateHome->gf+= intval($request['home']);
                $updateHome->gc+= intval($request['visit']);
                $updateHome->pts+= 1;
                $updateHome->save();

                $updateVisit->pj+= 1;
                $updateVisit->e+= 1;
                $updateVisit->gf+= intval($request['visit']);
                $updateVisit->gc+= intval($request['home']);
                $updateVisit->pts+= 1;
                $updateVisit->save();

                $Updatepartido->empate = true;
                $Updatepartido->save();

                $UpdateQuinelas = Quinela::where('id_partido', $partido->id)->where('empate', true)->get();
                foreach ($UpdateQuinelas as $quinela) {
                    $quinela->win = true;
                    $quinela->save();
                }

            }else{
                //$perro = "visit";
                $updateVisit->pj+=1;
                $updateVisit->pg+=1;
                $updateVisit->gf+= intval($request['visit']);
                $updateVisit->gc+= intval($request['home']);
                $updateVisit->pts+= 3;
                $updateVisit->save();

                $updateHome->pj+=1;
                $updateHome->pp+=1;
                $updateHome->gf+= intval($request['home']);
                $updateHome->gc+= intval($request['visit']);
                $updateHome->save();

                $Updatepartido->visit = true;
                $Updatepartido->save();

                $UpdateQuinelas = Quinela::where('id_partido', $partido->id)->where('visit', true)->get();
                foreach ($UpdateQuinelas as $quinela) {
                    $quinela->win = true;
                    $quinela->save();
                }
            }
            return response()->json(['partido'=>$Updatepartido],200);
    }
}
