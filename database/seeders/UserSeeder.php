<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>"admin",
            "email"=>"admin@train.com",
            "email_verified_at"=>now(),
            "password"=>bcrypt("admin123"),
            "phone"=>"555223",
            "nik"=>"9999",
            "address"=>"admin st",
            "remember_token"=>Str::random(10),
        ])->assignRole("admin");
        User::create([
            "name"=>"staff",
            "email"=>"staff@train.com",
            "email_verified_at"=>now(),
            "password"=>bcrypt("staff123"),
            "phone"=>"555222",
            "nik"=>"8888",
            "address"=>"staff st",
            "remember_token"=>Str::random(10),
        ])->assignRole("staff");
        User::create([
            "name"=>"customer",
            "email"=>"customer@train.com",
            "email_verified_at"=>now(),
            "password"=>bcrypt("customer123"),
            "phone"=>"555224",
            "nik"=>"7777",
            "address"=>"halo st",
            "remember_token"=>Str::random(10),
        ])->assignRole("customer");
    }
}
