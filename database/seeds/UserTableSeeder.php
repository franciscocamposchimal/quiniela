<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => app('hash')->make('admin'),
            'pass' => '',
            'role' => 1,
            'remember_token' => str_random(10),
        ]);
        //factory(App\User::class, 8)->create();
    }
}
