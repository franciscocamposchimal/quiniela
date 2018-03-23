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
        $user = JWTAuth::parseToken()->authenticate();

        if($user->role == 1){
            
            $partido = Partido::find($id_partido);
            $updateHome= GpoDetalle::where('id',$partido->equipoHome->id)->first();
            $updateVisit= GpoDetalle::where('id',$partido->equipoVisit->id)->first();

            if($request['played'] == true){


                if(intval($request['home']) > intval($request['visit'])){
                        //Home
                        return $this->ganaHome($updateHome, $updateVisit, $partido, $request['home'], $request['visit']);

                    }elseif(intval($request['home']) == intval($request['visit'])){
                        //Empate
                        return $this->empate($updateHome, $updateVisit, $partido, $request['home'], $request['visit']);

                    }else{
                        //Visit
                        return $this->ganaVisit($updateHome, $updateVisit, $partido, $request['home'], $request['visit']);
                    }

            }elseif($request['played'] == false){

                $Updatepartido = FasesDetalle::where('id_partido', $id_partido)->first();
                $perro = "";
                if( ($Updatepartido->goles_home != $Updatepartido->goles_visit) && (intval($request['home']) != intval($request['visit'])) ){
                    $perro = "caso uno";
                    //Ganará Home
                    if(intval($request['home']) > intval($request['visit'])){
                        //caso home ganó y ahora ganará home
                        if($Updatepartido->goles_home > $Updatepartido->goles_home){
                            $this->restaHome($updateHome, $updateVisit, $Updatepartido->goles_home, $Updatepartido->goles_visit);
                            return $this->ganaHome($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                        }//caso visit ganó y ahora ganará home
                        elseif($Updatepartido->goles_home < $Updatepartido->goles_visit){
                            $this->restaVisit($updateHome, $updateVisit, $Updatepartido->goles_home, $Updatepartido->goles_visit);
                            return $this->ganaHome($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                        }
                    }//Ganará Visit
                    elseif(intval($request['home']) < intval($request['visit'])){
                        //caso ganó home y ahora ganará visit
                        if($Updatepartido->goles_home > $Updatepartido->goles_visit){
                            $this->restaHome($updateHome, $updateVisit, $Updatepartido->goles_home, $Updatepartido->goles_visit);
                            return $this->ganaVisit($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                        }//caso ganó visit y ahora ganará visit
                        elseif($Updatepartido->goles_home < $Updatepartido->goles_visit){
                            $this->restaVisit($updateHome, $updateVisit, $Updatepartido->goles_home, $Updatepartido->goles_visit);
                            return $this->ganaVisit($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                        }
                    }
                }elseif( ($Updatepartido->goles_home == $Updatepartido->goles_visit) && (intval($request['home']) != intval($request['visit'])) ){
                    //$perro = "caso dos";
                    if(intval($request['home']) > intval($request['visit'])){
                        $this->restaEmpate($updateHome, $updateVisit, $Updatepartido->goles_home, $Updatepartido->goles_visit);
                        return $this->ganaHome($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                    }
                    elseif(intval($request['home']) < intval($request['visit'])){
                        $this->restaEmpate($updateHome, $updateVisit, $Updatepartido->goles_home, $Updatepartido->goles_visit);
                        return $this->ganaVisit($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                    }
                }elseif( ($Updatepartido->goles_home == $Updatepartido->goles_visit) && (intval($request['home']) == intval($request['visit'])) ){
                    //$perro = "caso tres";
                    $this->restaEmpate($updateHome, $updateVisit, $Updatepartido->goles_home , $Updatepartido->goles_visit);
                    return $this->empate($updateHome, $updateVisit, $partido, intval($request['home']), intval($request['visit']));

                }elseif( ($Updatepartido->goles_home != $Updatepartido->goles_visit) && (intval($request['home']) == intval($request['visit'])) ){
                    //$perro = "caso cuatro";
                    //caso ganó home y ahora será empate
                    if($Updatepartido->goles_home > $Updatepartido->goles_visit){
                        $this->restaHome($updateHome, $updateVisit, $Updatepartido->goles_home, $Updatepartido->goles_visit);
                        return $this->empate($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                    }//caso ganó visit y ahora será empate 
                    elseif($Updatepartido->goles_home < $Updatepartido->goles_visit){
                        $this->restaVisit($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                        return $this->empate($updateHome, $updateVisit, intval($request['home']), intval($request['visit']));
                    }
                }
            }

            //return response()->json(['partido'=>$perro],200);
            
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }

    protected function ganaHome($updateHome, $updateVisit, $partido, $goles_home, $goles_visit){
        $updateHome->pj+=1;
        $updateHome->pg+=1;
        $updateHome->gf+= intval($goles_home);
        $updateHome->gc+= intval($goles_visit);
        $updateHome->pts+= 3;
        $updateHome->save();

        $updateVisit->pj+=1;
        $updateVisit->pp+=1;
        $updateVisit->gf+= intval($goles_visit);
        $updateVisit->gc+= intval($goles_home);
        $updateVisit->save();


        $Updatepartido = FasesDetalle::with(['fase','partido.equipoHome.equipo','partido.equipoVisit.equipo'])->where('id_partido', $partido->id)->first();
        $Updatepartido->home = true;
        $Updatepartido->goles_home = intval($goles_home);
        $Updatepartido->goles_visit = intval($goles_visit);
        $Updatepartido->played = true;
        $Updatepartido->save();

        $UpdateQuinelas = Quinela::where('id_partido', $partido->id)->where('home', true)->get();
        foreach ($UpdateQuinelas as $quinela) {
            $quinela->win = true;
            $quinela->save();
        }

        return response()->json(['partido'=>$Updatepartido],200);
    }
    protected function ganaVisit($updateHome, $updateVisit, $partido, $goles_home, $goles_visit){

        $updateVisit->pj+=1;
        $updateVisit->pg+=1;
        $updateVisit->gf+= intval($goles_visit);
        $updateVisit->gc+= intval($goles_home);
        $updateVisit->pts+= 3;
        $updateVisit->save();

        $updateHome->pj+=1;
        $updateHome->pp+=1;
        $updateHome->gf+= intval($goles_home);
        $updateHome->gc+= intval($goles_visit);
        $updateHome->save();

        $Updatepartido = FasesDetalle::with(['fase','partido.equipoHome.equipo','partido.equipoVisit.equipo'])->where('id_partido', $partido->id)->first();
        $Updatepartido->visit = true;
        $Updatepartido->goles_home = intval($goles_home);
        $Updatepartido->goles_visit = intval($goles_visit);
        $Updatepartido->played = true;
        $Updatepartido->save();

        $UpdateQuinelas = Quinela::where('id_partido', $partido->id)->where('visit', true)->get();
        foreach ($UpdateQuinelas as $quinela) {
            $quinela->win = true;
            $quinela->save();
        }

        return response()->json(['partido'=>$Updatepartido],200);
    }
    protected function empate($updateHome, $updateVisit, $partido, $goles_home, $goles_visit){
        $updateHome->pj+= 1;
        $updateHome->e+= 1;
        $updateHome->gf+= intval($goles_home);
        $updateHome->gc+= intval($goles_visit);
        $updateHome->pts+= 1;
        $updateHome->save();

        $updateVisit->pj+= 1;
        $updateVisit->e+= 1;
        $updateVisit->gf+= intval($goles_visit);
        $updateVisit->gc+= intval($goles_home);
        $updateVisit->pts+= 1;
        $updateVisit->save();

        $Updatepartido = FasesDetalle::with(['fase','partido.equipoHome.equipo','partido.equipoVisit.equipo'])->where('id_partido', $partido->id)->first();
        $Updatepartido->empate = true;
        $Updatepartido->goles_home = intval($goles_home);
        $Updatepartido->goles_visit = intval($goles_visit);
        $Updatepartido->played = true;
        $Updatepartido->save();

        $UpdateQuinelas = Quinela::where('id_partido', $partido->id)->where('empate', true)->get();
        foreach ($UpdateQuinelas as $quinela) {
            $quinela->win = true;
            $quinela->save();
        }

        return response()->json(['partido'=>$Updatepartido],200);
    }

    protected function restaHome($updateHome, $updateVisit, $goles_home, $goles_visit){
        $updateHome->pj = $updateHome->pj - 1;
        $updateHome->pg = $updateHome->pg - 1;
        $updateHome->gf = $updateHome->gf - intval($goles_home);
        $updateHome->gc = $updateHome->gc - intval($goles_visit);
        $updateHome->pts = $updateHome->pts - 3;
        $updateHome->save();

        $updateVisit->pj = $updateVisit->pj - 1;
        $updateVisit->pp = $updateVisit->pp - 1;
        $updateVisit->gf = $updateVisit->gf - intval($goles_visit);
        $updateVisit->gc = $updateVisit->gc - intval($goles_home);
        $updateVisit->save();
    }
    protected function restaVisit($updateHome, $updateVisit, $goles_home, $goles_visit){
        $updateHome->pj = $updateHome->pj - 1;
        $updateHome->pp = $updateHome->pp - 1;
        $updateHome->gf = $updateHome->gf - intval($goles_home);
        $updateHome->gc = $updateHome->gc - intval($goles_visit);
        $updateHome->save();

        $updateVisit->pj = $updateVisit->pj - 1;
        $updateVisit->pg = $updateVisit->pg -1;
        $updateVisit->gf = $updateVisit->gf - intval($goles_visit);
        $updateVisit->gc = $updateVisit->gc - intval($goles_home);
        $updateVisit->pts = $updateVisit->pts - 3;
        $updateVisit->save();
    }
    protected function restaEmpate($updateHome, $updateVisit, $goles_home, $goles_visit){
        $updateHome->pj = $updateHome->pj - 1;
        $updateHome->e = $updateHome->e - 1;
        $updateHome->gf =  $updateHome->gf - intval($goles_home);
        $updateHome->gc =  $updateHome->gc - intval($goles_visit);
        $updateHome->pts = $updateHome->pts - 1;
        $updateHome->save();

        $updateVisit->pj = $updateVisit->pj - 1;
        $updateVisit->e =  $updateVisit->e - 1;
        $updateVisit->gf = $updateVisit->gf - intval($goles_visit);
        $updateVisit->gc =  $updateVisit->gc - intval($goles_home);
        $updateVisit->pts = $updateVisit->pts - 1;
        $updateVisit->save();
    }
}