<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'photo'=>asset('seed/admin.png'),
            'users_id'=>1
        ]);
        Profile::create([
            'photo'=>asset('seed/admin.png'),
            'users_id'=>2
        ]);
        Profile::create([
            'photo'=>asset('seed/admin.png'),
            'users_id'=>3
        ]);
    }
}
