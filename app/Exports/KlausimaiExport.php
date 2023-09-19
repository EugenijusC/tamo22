<?php

namespace App\Exports;

use App\Klausimai;
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;

class KlausimaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $grupe;

    public function __construct($grupe)
    {
       $this->grupe = $grupe;
    }
    
    public function collection()
    {
        //dd($this->grupe );
        return Klausimai::where('klaus_gr_id', $this->grupe)->get();   //all();
    }
}
