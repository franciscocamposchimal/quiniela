<?php

namespace App\Transformer;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    function transform(User $user){
        return[
            'id'=>$user->id,
            'nombre'=>$user->nombre,
            'username'=>$user->username,
            'email'=>$user->email
        ];
    }
}