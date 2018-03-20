<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quinela extends Model
{
    protected $table = 'quinelas';

    protected $fillable = [
        'home',
        'visit',
        'empate',
        'win',
    ];

    protected $hidden = [
        'id_user',
        'id_partido',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function partido()
    {
        return $this->belongsTo('App\Partido', 'id_partido');
    }
}
