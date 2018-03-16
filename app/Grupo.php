<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    public function gpoDetalles()
    {
        return $this->hasMany('App\GpoDetalle', 'id_gpo');
    }
}
