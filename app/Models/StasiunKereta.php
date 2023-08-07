<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StasiunKereta extends Model
{
    use HasFactory;
    public $guarded = ['id'];
    public $table = "stasiun_keretas";

    public function kereta()
    {
        return $this->belongsTo(Kereta::class,"kereta_id");
    }
    public function stasiunTo()
    {
        return $this->belongsTo(Stasiun::class,"stasiun_to_id");
    }
    public function stasiunFrom()
    {
        return $this->belongsTo(Stasiun::class,"stasiun_from_id");
    }
    public function penumpang()
    {
        return $this->hasMany(Penumpang::class);
    }
}
