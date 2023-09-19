<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klausimai extends Model
{
    use HasFactory;

    public function scopeLike($query, $s) {
        return $query->where('klaus_pavadinimas','LIKE', "%{$s}%");

    }
}
