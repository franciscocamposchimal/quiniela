<?php

use Illuminate\Database\Seeder;

class PruebaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pruebas = App\User::find(1);
        //echo $pruebas;
        /*foreach ($pruebas->quinelas as $quinela) {
            echo $quinela;
        }*/
        //echo $pruebas->quinelas;
        //echo $pruebas->partido;
        if($pruebas->name == 'admin'){
            unset($pruebas['name']);
        }
        echo $pruebas;
    }
}
