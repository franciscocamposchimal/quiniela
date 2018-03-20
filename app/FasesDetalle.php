<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FasesDetalle extends Model
{
    protected $table = 'fasesDetalles';

    protected $fillable = [
        'home',
        'visit',
        'empate',
    ];

    protected $hidden = [
        'id_fase',
        'id_partido',
        'created_at',
        'updated_at',
    ];
    
    public function fase()
    {
        return $this->belongsTo('App\Fase', 'id_fase');
    }
    public function partido()
    {
        return $this->belongsTo('App\Partido', 'id_partido');
    }
}
