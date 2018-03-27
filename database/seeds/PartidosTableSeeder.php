<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class PartidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('partidos')->insert([
            // partido 1    
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 1)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 2)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // partido 2
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 3)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 4)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //partido 3 
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 7)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 8)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 4
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 5)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 6)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
             //PARTIDO 5
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 9)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 10)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 6
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 13)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 14)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 7
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 11)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 12)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 8
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 15)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 16)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
             //PARTIDO 9
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 19)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 20)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 10
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 21)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 22)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 11
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 17)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 18)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 12
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 23)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 24)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 13
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 25)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 26)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 14
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 27)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 28)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 15
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 29)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 30)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 16
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 31)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 32)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 17
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 1)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 3)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 18
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 5)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 7)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 19
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 4)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 2)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 20
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 8)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 6)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 21
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 9)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 11)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 22
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 12)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 10)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 23
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 13)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 15)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 24
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 17)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 19)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 25
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 16)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 14)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 26
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 20)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 18)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 27
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 25)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 27)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 28
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 21)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 23)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 29
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 24)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 22)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 30
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 28)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 26)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 31
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 32)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 30)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 32
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 29)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 31)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // partido 33    
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 2)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 3)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // partido 34
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 4)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 1)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //partido 35 
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 6)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 7)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 36
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 8)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 5)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
             //PARTIDO 37
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 12)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 9)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 38
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 10)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 11)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 39
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 14)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 15)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 40
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 16)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 13)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
             //PARTIDO 41
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 24)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 21)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 42
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 22)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 23)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 43
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 20)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 17)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 44
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 18)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 19)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 45
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 30)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 31)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 46
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 32)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 29)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 47
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 28)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 25)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            //PARTIDO 48
            [
                'id_gpodet_home' => App\GpoDetalle::where('id_equipo', 26)->value('id'),
                'id_gpodet_visit' => App\GpoDetalle::where('id_equipo', 27)->value('id'),
                'fecha' => Carbon::createFromFormat('d/m/Y h:i A', '15/06/2018 10:00 PM'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
