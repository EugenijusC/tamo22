<?php

namespace App\Exports;

use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class UsersExport implements FromView
{
    public function view(): View
    {
        return view('user.rezultatai', [
            'users' => User::all()
        ]);
    }
}

//use Illuminate\Contracts\View\View;
//use Maatwebsite\Excel\Concerns\FromView;
//use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class UsersExport implements FromView, ShouldAutoSize
// {
//     use Exportable;

//     public function view() : View
//     {
//         return view('rezults');
//     }
// }



// class UsersExport implements FromCollection
// {
//     use Exportable;
   
//     public function collection()
//     {
//         return User::all();
//     }
// }



//  Veikia iš query
// class UsersExport implements FromQuery
// {
//     use Exportable;
   
//     public function __construct(int $centras)
//     {
//         $this->centras = $centras;
//     }

//     public function query()
//     {
//         return User::query()->where('centras', $this->centras);
//     }
// }

