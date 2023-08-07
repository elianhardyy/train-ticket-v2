<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananOffline extends Model
{
    use HasFactory;
    public $guarded = ['id'];
    public $table = "pemesanan_offlines";
    public $timestamps = true;

    public function kereta()
    {
        return $this->belongsTo(Kereta::class,'kereta_id');
    }
    public function stasiunkereta()
    {
        return $this->belongsTo(StasiunKereta::class,'stasiun_kereta_id');
    }
}
