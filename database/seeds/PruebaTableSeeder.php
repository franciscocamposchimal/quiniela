<?php

use Illuminate\Database\Seeder;
use App\User;

class PruebaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_partido = 2;
        $id = 7;
        $quinielaUser = User::with(['quinelas'=> function ($query) use ($id_partido){
                            $query->where('id_partido', $id_partido);
                        }])->where('id', $id)->get(['id']);
        foreach ($quinielaUser as $item) {
            if ($item['quinelas']){
                foreach ($item['quinelas'] as $quin) {
                     echo $quin['visit'];
                }
             
            }
        }
    }
}
