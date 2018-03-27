<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finishers extends Model
{
    protected $table = 'finishers';

    protected $fillable = [
        'place',
        'position',
        'id_user',
    ];

    protected $hidden = [
        'id_user',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
