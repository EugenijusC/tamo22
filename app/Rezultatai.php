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

    public function scopeRez($query,$admin,$nuo,$iki,  $puslapiavimas,$kontr=0,$centras=-1) {

        switch ($kontr) {
            case 0:
                break;
            default:
                $query->where('users_id', $kontr);
        }

        switch ($centras) {
            case -1:
                break;
            default:
               $query->with('users')
               ->whereHas('users', function($query) use ($centras){
                $query->where('centras', $centras);
               });
              //dd(users()->centras);
        }

        return $query->whereBetween('testas_pradzia',[$nuo,$iki])
            ->orderBy('testas_pradzia','desc')
          //  ->where('users_id', $kontr)
            ->paginate($puslapiavimas);
    }


}
