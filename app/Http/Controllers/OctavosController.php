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
        $gpoA = GpoDetalle::with(['grupo'])->orderBy('pg', 'desc')->get();

        return response()->json(['gpo a'=>$gpoA],200);
    }

    public function getAllUser(){

    }
}
