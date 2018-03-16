<?php

use Illuminate\Database\Seeder;

class FasesDetalleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $partidoJornada1 = App\Partido::whereBetween('id', [1, 16])->get();
        $partidoJornada2 = App\Partido::whereBetween('id', [17, 32])->get();
        $partidoJornada3 = App\Partido::whereBetween('id', [33, 48])->get();
        $partidoJornada1->map(function ($item) {
            $Jornada1 = App\Fase::where('name', 'Jornada 1')->first();
            DB::table('fasesDetalles')->insert([
                'home'=>false,
                'visit'=>false,
                'empate'=>false,
                'id_fase'=>$Jornada1->id,
                'id_partido'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });

        $partidoJornada2->map(function ($item) {
            $Jornada2 = App\Fase::where('name', 'Jornada 2')->first();
            DB::table('fasesDetalles')->insert([
                'home'=>false,
                'visit'=>false,
                'empate'=>false,
                'id_fase'=>$Jornada2->id,
                'id_partido'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });

        $partidoJornada3->map(function ($item) {
            $Jornada3 = App\Fase::where('name', 'Jornada 3')->first();
            DB::table('fasesDetalles')->insert([
                'home'=>false,
                'visit'=>false,
                'empate'=>false,
                'id_fase'=>$Jornada3->id,
                'id_partido'=>$item->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        });
    }
}
