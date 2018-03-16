<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'partidos';

    protected $hidden = [
        'id_gpodet_home',
        'id_gpodet_visit',
        'created_at',
        'updated_at',
    ];
    
    public function equipoHome()
    {
        return $this->belongsTo('App\GpoDetalle', 'id_gpodet_home');
    }
    public function equipoVisit()
    {
        return $this->belongsTo('App\GpoDetalle', 'id_gpodet_visit');
    }
    public function faseDetalle()
    {
        return $this->hasOne('App\FasesDetalle', 'id_partido');
    }
    public function quinelas()
    {
        return $this->hasMany('App\Quinela', 'id_partido');
    }

}
