<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $table = 'fases';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function fasesDetalles()
    {
        return $this->hasMany('App\FasesDetalle', 'id_fase');
    }
}
