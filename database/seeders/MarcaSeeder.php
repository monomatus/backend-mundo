<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $marcas = array(
            ['samsung'],
            ['lg'],
            ['tcl'],
            ['xiaomi']
        );
        $marcas = array_map(function($marca) use($now){
            return [
                'nombre'=> $marca[0],
                'created_at'=> $now,
                'updated_at'=> $now
            ];
            
        },$marcas);
        DB::table('marca')->insert($marcas);
        
    }
}
