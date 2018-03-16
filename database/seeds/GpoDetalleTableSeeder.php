<?php

use Illuminate\Database\Seeder;

class GpoDetalleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipoA = App\Equipo::whereBetween('id', [1, 4])->get();
        $equipoB = App\Equipo::whereBetween('id', [5, 8])->get();
        $equipoC = App\Equipo::whereBetween('id', [9, 12])->get();
        $equipoD = App\Equipo::whereBetween('id', [13, 16])->get();
        $equipoE = App\Equipo::whereBetween('id', [17, 20])->get();
        $equipoF = App\Equipo::whereBetween('id', [21, 24])->get();
        $equipoG = App\Equipo::whereBetween('id', [25, 28])->get();
        $equipoH = App\Equipo::whereBetween('id', [29, 32])->get();                  
        //echo $equipoB;

        $equipoA->map(function ($item) {
            $grupoA = App\Grupo::where('name', 'A')->first();
            DB::table('gpoDetalles')->insert([
                'pj'=>0,
                'pg'=>0,
                'e'=>0,
                'pp'=>0,
                'gf'=>0,
                'gc'=>0,
                'pts'=>0,
                'id_gpo'=>$grupoA->id,
                'id_equipo'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
        $equipoB->map(function ($item) {
            $grupoB = App\Grupo::where('name', 'B')->first();
            DB::table('gpoDetalles')->insert([
                'pj'=>0,
                'pg'=>0,
                'e'=>0,
                'pp'=>0,
                'gf'=>0,
                'gc'=>0,
                'pts'=>0,
                'id_gpo'=>$grupoB->id,
                'id_equipo'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
        $equipoC->map(function ($item) {
            $grupoC = App\Grupo::where('name', 'C')->first();
            DB::table('gpoDetalles')->insert([
                'pj'=>0,
                'pg'=>0,
                'e'=>0,
                'pp'=>0,
                'gf'=>0,
                'gc'=>0,
                'pts'=>0,
                'id_gpo'=>$grupoC->id,
                'id_equipo'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
        $equipoD->map(function ($item) {
            $grupoD = App\Grupo::where('name', 'D')->first();
            DB::table('gpoDetalles')->insert([
                'pj'=>0,
                'pg'=>0,
                'e'=>0,
                'pp'=>0,
                'gf'=>0,
                'gc'=>0,
                'pts'=>0,
                'id_gpo'=>$grupoD->id,
                'id_equipo'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
        $equipoE->map(function ($item) {
            $grupoE = App\Grupo::where('name', 'E')->first();
            DB::table('gpoDetalles')->insert([
                'pj'=>0,
                'pg'=>0,
                'e'=>0,
                'pp'=>0,
                'gf'=>0,
                'gc'=>0,
                'pts'=>0,
                'id_gpo'=>$grupoE->id,
                'id_equipo'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
        $equipoF->map(function ($item) {
            $grupoF = App\Grupo::where('name', 'F')->first();
            DB::table('gpoDetalles')->insert([
                'pj'=>0,
                'pg'=>0,
                'e'=>0,
                'pp'=>0,
                'gf'=>0,
                'gc'=>0,
                'pts'=>0,
                'id_gpo'=>$grupoF->id,
                'id_equipo'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
        $equipoG->map(function ($item) {
            $grupoG = App\Grupo::where('name', 'G')->first();
            DB::table('gpoDetalles')->insert([
                'pj'=>0,
                'pg'=>0,
                'e'=>0,
                'pp'=>0,
                'gf'=>0,
                'gc'=>0,
                'pts'=>0,
                'id_gpo'=>$grupoG->id,
                'id_equipo'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
        $equipoH->map(function ($item) {
            $grupoH = App\Grupo::where('name', 'H')->first();
            DB::table('gpoDetalles')->insert([
                'pj'=>0,
                'pg'=>0,
                'e'=>0,
                'pp'=>0,
                'gf'=>0,
                'gc'=>0,
                'pts'=>0,
                'id_gpo'=>$grupoH->id,
                'id_equipo'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
    }
}
