<?php

namespace Database\Seeders;

use App\Models\Stasiun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StasiunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stasiun::create([
            "nama_stasiun"=>"Mojokerto",
                    ]);
        Stasiun::create([
            "nama_stasiun"=>"Surabaya Kota",
                    ]);
        Stasiun::create([
            "nama_stasiun"=>"Surabaya Gubeng",

        ]);
        Stasiun::create([
            "nama_stasiun"=>"Wonokromo",
                    ]);
        Stasiun::create([
            "nama_stasiun"=>"Sepanjang",

        ]);
        Stasiun::create([
            "nama_stasiun"=>"Boharan",

        ]);
        Stasiun::create([
            "nama_stasiun"=>"Kedinding",

        ]);
        Stasiun::create([
            "nama_stasiun"=>"Gambir",

        ]);
    }
}
