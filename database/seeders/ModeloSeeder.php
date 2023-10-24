<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $modelos = array(
            ['a',1],
            ['b',2],
            ['c',3]
        );
        $modelos = array_map(function($modelo) use($now){
            return[
                'nombre'=>$modelo[0],
                'id_marca'=>$modelo[1],
                'created_at'=> $now,
                'updated_at'=> $now
                
            ];
        },$modelos);

        DB::table('modelo')->insert($modelos);
    }
}
