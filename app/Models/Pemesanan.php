<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'uuid',
        'username',
        'alamat',
        'nik',
        'harga',
        'jenis_gerbong',
        'gerbong',
        'tanggal',
        'huruf_kursi',
        'nomor_kursi',
        'users_id',
        'penumpang_id'
    ];
    public $table = "pemesanans";
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(User::class,"users_id");
    }
    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class,"penumpang_id");
    }
}
