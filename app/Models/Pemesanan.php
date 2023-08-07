<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    
    public $guarded = ['id'];
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
