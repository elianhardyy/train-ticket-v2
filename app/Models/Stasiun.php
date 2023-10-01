<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    use HasFactory,Sluggable;

    public $guarded = ['id'];
    public $table = "stasiuns";
    public function sluggable(): array
    {
        return[
            'slug'=>[
                'source'=>'nama_stasiun'
            ]
        ];
    }
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function kereta()
    {
        return $this->hasMany(Kereta::class);
    }
}
