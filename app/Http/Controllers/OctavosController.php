<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\FasesDetalle;
use App\Partido;
use App\GpoDetalle;
use App\Quinela;
use App\User;

class OctavosController extends Controller
{
    public function getAllAdmin(){
        $gpoA = GpoDetalle::with('grupo','equipo')->whereHas('grupo',function ($query) {
            $query->where('name', 'like', 'A');
        })->where()->orderBy('pg', 'desc')->get();

        $gpoB = GpoDetalle::with('grupo','equipo')->whereHas('grupo',function ($query) {
            $query->where('name', 'like', 'B');
        })->orderBy('pg', 'desc')->take(3)->get();

        $gpoC = GpoDetalle::with('grupo','equipo')->whereHas('grupo',function ($query) {
            $query->where('name', 'like', 'C');
        })->orderBy('pg', 'desc')->take(3)->get();

        $gpoD = GpoDetalle::with('grupo','equipo')->whereHas('grupo',function ($query) {
            $query->where('name', 'like', 'D');
        })->orderBy('pg', 'desc')->take(3)->get();

                
        $gpoE = GpoDetalle::with('grupo','equipo')->whereHas('grupo',function ($query) {
            $query->where('name', 'like', 'E');
        })->orderBy('pg', 'desc')->take(3)->get();

        $gpoF = GpoDetalle::with('grupo','equipo')->whereHas('grupo',function ($query) {
            $query->where('name', 'like', 'F');
        })->orderBy('pg', 'desc')->take(3)->get();

        $gpoG = GpoDetalle::with('grupo','equipo')->whereHas('grupo',function ($query) {
            $query->where('name', 'like', 'G');
        })->orderBy('pg', 'desc')->take(3)->get();

        $gpoH = GpoDetalle::with('grupo','equipo')->whereHas('grupo',function ($query) {
            $query->where('name', 'like', 'H');
        })->orderBy('pg', 'desc')->take(3)->get();

        return response()->json(['gpo a'=>$gpoA],200);
    }

    public function getAllUser(){

    }
}
