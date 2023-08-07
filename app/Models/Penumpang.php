<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;
    public $guarded = ['id'];
    public $table = "penumpangs";
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class,"users_id");
    }
    public function stasiunkereta()
    {
        return $this->belongsTo(StasiunKereta::class,"stasiun_kereta_id");
    }
    public function kereta()
    {
        return $this->belongsTo(Kereta::class,"kereta_id"); 
    }
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class,"penumpang_id");
    }
}
