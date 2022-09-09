<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
///use Cviebrock\EloquentSluggable\Sluggable;

class Contact extends Model {

 ///   use Sluggable;

    public $timestamps = true;
    protected $fillable =['email','subject','message','atsakymas'];

    // public function sluggable(): array
    // {
    //     return [
    //         'subject' => [
    //             'source' => 'email'
    //         ]
    //     ];
    // }

    public function users()
    {
       
        //return $this->belongsTo(Contact::class);
        return $this->belongsTo(User::class);
    }
    
}
