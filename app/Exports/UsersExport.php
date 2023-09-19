<?php
/*
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
*/

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

/*
namespace App\Exports;

use App\User;
use GuzzleHttp\Psr7\Request;

//use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
*/
/*
class UsersExport implements FromCollection, WithHeadings, WithMapping, WithStrictNullComparison
{
    public function collection()
    {
        //use MessageTrait;

        //dd();
        return USER::where('centras','=','0')->paginate(50);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Vardas',
            'El. paštas',
            'Centras',
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->centras,
        ];
    }
}
*/

/*
class UsersExport implements FromCollection
{
    protected $filters;
    protected $title;
    protected $date;

    public function __construct(array $filters = [], $title = null, $date = null)
    {
        $this->filters = $filters;
        $this->title = $title;
        $this->date = $date;
    }

    public function collection()
    {
        // Sukuriamas ir grąžinamas kolekcijos objektas su filtruotais duomenimis
        
        return USER::all();
    }

    public function title(): string
    {
        return $this->title ?? 'Users';
    }
}
*/
namespace App\Exports;
use App\User;
use App\Rezultatai;
use App\klausimu_analizei;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
//class UsersExport implements FromView, WithHeadings
class UsersExport implements WithHeadings,FromCollection,WithEvents
{
    protected $nuo, $iki, $centras, $kontr;

    use Exportable;
    public function view(): View
    {
        return view('user.rez_table', [
            'rez' => klausimu_analizei::all() 
                    
        ]);
    }
    // use Exportable;

    public function __construct($nuo,$iki,$centras,$kontr,$kontr_vardas)
    {
        $this->nuo = $nuo;
        $this->iki = date('Y-m-d',strtotime($iki.'+1 days'));
        $this->centras = ($centras == '-1') ?  '%' : substr($centras,-1);
        $this->kontr = ($kontr == -1) ? '%' : $kontr;
        $this->kontr_vardas = $kontr_vardas;
    }

    public function headings(): array
    {
        return [
            ['Laikotarpis: ',$this->nuo .' iki '. $this->iki],
            ['Centras:  ', $this->centras],
            ['Kontrolierius:  ', $this->kontr_vardas],
            [''],
            ['ID',
            'Vardas',
            'Centras',
            'Testo tipas',
            '     Testo pradžia         ',
            '     Testo pabaiga         ',
            'Rezultatas']
        ];
    }
    
    public function collection()
    {
      //  dd($this->centras );
        return Rezultatai::select('rezultatais.id','name','centras','testas_tipas','testas_pradzia','testas_pabaiga','testas_pazangumas')
                            ->leftJoin('users','users.id','=','rezultatais.users_id')
                            //->with('users:id,name,centras,id')
                            ->whereBetween('testas_pradzia',[$this->nuo,$this->iki])
                            ->where('users_id','like', $this->kontr)
                            ->where('centras','like', $this->centras.'%')
                               // ->with('users')->whereHas('users', function($query) use ($this->centras){
                               //  $query->where('centras', $this->centras); })
                           // ->where('testas_')    
                            ->get();   //all();
    }
    // public function query()
    // {
    //     $rez= Rezultatai::Rez(1,$this->param1,$this->param2,200,-1,'1');
    //     dd($rez);
    //     return $rez
    //         //->where('centras', $this->param3)
    //         //->where('param2', $this->param2)
    //         ;
    // }
    public function registerEvents(): array

    {

        return [

            AfterSheet::class    => function(AfterSheet $event) {

   

                //$event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setSize(16);
                $event->sheet->getDelegate()->getStyle('2')->getFont()->setSize(16);
                $event->sheet->getDelegate()->getStyle('3')->getFont()->setSize(16);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(33);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(10);
                $event->sheet->getDelegate()->freezePane('A4');
                $event->sheet->getDelegate()->getStyle('1')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('2')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('3')->getFont()->setBold(true);
            },

        ];

    }
}

