<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $guarded = ['id'];
    public $table = "profiles";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
