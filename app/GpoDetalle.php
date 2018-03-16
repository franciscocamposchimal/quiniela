<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GpoDetalle extends Model
{
    protected $table = 'gpoDetalles';

    protected $hidden = [
        'id_equipo',
        'id_gpo',
        'created_at',
        'updated_at',
    ];

    public function equipo()
    {
        return $this->belongsTo('App\Equipo', 'id_equipo');
    }
    public function grupo()
    {
        return $this->belongsTo('App\Grupo', 'id_gpo');
    }
    public function partidosHome()
    {
        return $this->hasMany('App\Partido', 'id_gpodet_home');
    }
    public function partidosVisit()
    {
        return $this->hasMany('App\Partido', 'id_gpodet_visit');
    }
}
