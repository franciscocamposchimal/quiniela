<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function gpoDetalle()
    {
        return $this->hasOne('App\GpoDetalle','id_equipo');
    }
}