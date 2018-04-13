<?php

use Illuminate\Database\Seeder;

class QuinelasJugadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::where('id','!=',1)->orderBy('id', 'desc')->get();
        $partidos = App\Partido::all();
        foreach ($users as $user) {
            foreach ($partidos as $partido) {
                DB::table('quinelas')->insert([
                    'home'=>false,
                    'visit'=>false,
                    'empate'=>false,
                    'id_user'=>$user->id,
                    'id_partido'=>$partido->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);   
            }
        }
    }
}
