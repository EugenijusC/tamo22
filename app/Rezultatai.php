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

    public function scopeRez($query,$admin,$nuo,$iki,  $puslapiavimas,$kontr=-1,$centras) {

        switch ($admin) {
            case 0:
               // dd($admin);
                $query->where('users_id', $kontr)
                ->whereBetween('testas_pradzia',[$nuo,$iki])
                ->orderBy('testas_pradzia','desc');

                $query->with('users')
                ->whereHas('users', function($query) use ($centras){
                 $query->where('centras', $centras);
                });
                   break; 
            case 1: 
                switch ($kontr) {
                    case -1:
                        $query->whereBetween('testas_pradzia',[$nuo,$iki])
                        ->orderBy('testas_pradzia','desc');
                         if($centras <> -1) {
                            $query->with('users')
                                ->whereHas('users', function($query) use ($centras){
                                 $query->where('centras', $centras); });
                         };
                        break;
                    default:
                        $query->where('users_id', $kontr)
                        ->whereBetween('testas_pradzia',[$nuo,$iki])
                        ->orderBy('testas_pradzia','desc');
                        if($centras <> -1) {
                            $query->with('users')
                                ->whereHas('users', function($query) use ($centras){
                                 $query->where('centras', $centras); });
                         };
                }
                
            default:
               break;
        };
      //  dd($centras);

       

        // switch ($centras) {
        //     case -1:
        //         break;
        //     default:
        //        $query->with('users')
        //        ->whereHas('users', function($query) use ($centras){
        //         $query->where('centras', $centras);
        //        });

        //dd($query);

        return $query->paginate($puslapiavimas);
    }


}
