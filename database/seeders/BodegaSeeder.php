<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $now = now();
        for($i=0; $i<=3; $i++){
        DB::table('bodega')->insert([
            'created_at'=> $now,
            'updated_at'=> $now
        ]);
        }
    }
}
