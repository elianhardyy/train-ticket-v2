<?php

namespace Database\Seeders;

use App\Models\Kereta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeretaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kereta::create([
            "nama_kereta"=>"Mojojaya",
            "kelas"=>"Eksekutif",
            "harga"=>700000,
            "stasiun_from_id"=>1,
            "jam_berangkat"=>"12:00:00",
            "stasiun_to_id"=>8,
            "jam_tujuan"=>"23:00:00"
        ]);

    }
}
