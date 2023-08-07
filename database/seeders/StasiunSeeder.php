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
            "slug_stasiun"=>"MR",
        ]);
        Stasiun::create([
            "nama_stasiun"=>"Surabaya Kota",
            "slug_stasiun"=>"SB",
        ]);
        Stasiun::create([
            "nama_stasiun"=>"Surabaya Gubeng",
            "slug_stasiun"=>"SGU",
        ]);
        Stasiun::create([
            "nama_stasiun"=>"Wonokromo",
            "slug_stasiun"=>"WO",
        ]);
        Stasiun::create([
            "nama_stasiun"=>"Sepanjang",
            "slug_stasiun"=>"SPJ",
        ]);
        Stasiun::create([
            "nama_stasiun"=>"Boharan",
            "slug_stasiun"=>"BOH",
        ]);
        Stasiun::create([
            "nama_stasiun"=>"Kedinding",
            "slug_stasiun"=>"KDG",
        ]);
        Stasiun::create([
            "nama_stasiun"=>"Gambir",
            "slug_stasiun"=>"GMR",
        ]);
    }
}
