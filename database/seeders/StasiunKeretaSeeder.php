<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StasiunKereta;
class StasiunKeretaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StasiunKereta::create([
            "jam_kereta_from"=>"12:00:00",
            "jam_kereta_to"=>"23:00:00",
            "stasiun_from_id"=>1,
            "stasiun_to_id"=>8,
            "kereta_id"=>1,
        ]);
    }
}
