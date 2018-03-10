<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'nombre' => 'Master',
        'username' => 'superuser',
        'email' => 'admin@admin.com',
        'password' => Illuminate\Support\Facades\Hash::make('admin2018'),
    ];
});