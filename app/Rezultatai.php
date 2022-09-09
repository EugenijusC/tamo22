<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezultatai extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }

    // public function users(){
    //     return $this->belongsTo(User::class);
    // }


}
