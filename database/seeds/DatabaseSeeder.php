<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call('UserTableSeeder');
        $this->call('GruposTableSeeder');
        $this->call('EquiposTableSeeder');
        $this->call('GpoDetalleTableSeeder');
        $this->call('FasesTableSeeder');
        $this->call('FasesDetalleTableSeeder');
        $this->call('GruposTableSeeder'); 
        $this->call('PartidosTableSeeder');
        $this->call('QuinelasJugadorTableSeeder');
    }
}
