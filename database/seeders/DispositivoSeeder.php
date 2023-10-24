<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DispositivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $dispositivos = array(
            ['celular',1,1],
            ['tablet',2,1],
            ['smart tv',3,1]
        );
        $dispositivos = array_map(function($dispositivo) use($now){
            return[
                'nombre'=>$dispositivo[0],
                'id_bodega'=>$dispositivo[1],
                'id_modelo'=>$dispositivo[2],
                'created_at'=> $now,
                'updated_at'=> $now
            ];
        },$dispositivos);
        DB::table('dispositivo')->insert($dispositivos);
        
    }
}
