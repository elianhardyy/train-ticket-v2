<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    use HasFactory;
    use Sluggable;

    public $guarded = ['id'];
    public $table = "keretas";
    public $timestamps = true;
    public function sluggable(): array
    {
        return[
            'slug'=>[
                'source'=>'nama_kereta'
            ]
        ];
    }
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function stasiunFrom()
    {
        return $this->belongsTo(Stasiun::class,"stasiun_from_id");
    }
    public function stasiunTo()
    {
        return $this->belongsTo(Stasiun::class,"stasiun_to_id");
    }
}
