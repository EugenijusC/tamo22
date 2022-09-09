<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rezultatai;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;


class TestController extends Controller
{
    public function testo_start() {
        // $reviews = new Contact();
       if (Auth::id()) {
        return view('user.testostart');
       }
       else {
            return view('user.login');
       }

        //, ['contacts' => $reviews->all()]);
    }

    public function testas(Request $request) {
        $testoT =($request->testoTipas == 0 ? 'S':'N');
        $testoT1 =($request->testoTipas == 0 ? 'gr_sk_standart':'gr_sk_naujienos');

        $kl_sk_gr=DB::table('grupes')->select($testoT1.' as sk','grupe','gr_pavadinimas')->get();
        //dd($kl_sk_gr);    
        $klausimai=array();

        foreach ($kl_sk_gr as $title) {
  
            $klausimai1 = DB::table('klausimais')->select('klaus_id')
            ->where('klaus_testas',$testoT)
            ->where('klaus_gr_id',$title->grupe)
            ->inRandomOrder()->limit($title->sk)
            ->get()
            ->toArray();
           $klausimai= array_merge($klausimai, $klausimai1);

        }
       // dd($klausimai);

        if (sizeof($klausimai) == 0 ){
            return view('user.testostart');
        }

        shuffle($klausimai);
        $arr =  json_decode( json_encode($klausimai), true);;

             
        $laikas =  '\Config'::get('constants.testo_laikas.time_standart');
        if ($testoT == 'N') {
            $laikas =  '\Config'::get('constants.testo_laikas.time_news');
        }     

        $numbers = range(1, 4);
        shuffle($numbers);

        $maisymas=$numbers[0].$numbers[1].$numbers[2].$numbers[3];
        //dd($numbers);
        date_default_timezone_set('Europe/Vilnius');
        $user = Auth::id();
        $id = DB::table('rezultatais')->insertGetId(  [ 'users_id' => $user, 'rez_atsak' => $maisymas, 'testas_laikas' =>$laikas, 'testas_pradzia' =>date('Y/m/d H:i:s', time())]);

        foreach ($klausimai as $kl) {
              //$ats=strval($kl->klaus_teisingas1).strval($kl->klaus_teisingas2).strval($kl->klaus_teisingas3).strval($kl->klaus_teisingas4);
              DB::insert('insert into testas (test_testas_id, test_klaus_id) values(?,?)',[$id, $kl->klaus_id]);
      }

        $klausimai_end = DB::table('test_kl_view')
                ->where('test_testas_id',$id)
                ->get()
                ->toArray();  

        


        return view('user.testas', ['kl' => $klausimai_end, 'id' => $id, 'laikas' => $laikas, 'atsak' => $numbers]);
    }


    

    public function rezults_check(Request $request){

        //  dd($request->all());

        $valid = $request->validate([
            'data_nuo' => 'required|date|before:now',
            'data_iki' => 'required|date|after:data_nuo-1'
        ]);


        return redirect()->route('rezults');
    }

    public function rezults_sm(Request $request,$id){

        //dd($request);

        //$id=$request->testo_idas;

       //dd($id);

         $rez = DB::table('test_kl_view')
         ->where('test_testas_id',$id)
         ->get()
         ->toArray(); 

         $rez_sum = DB::table('rezultatais')
         ->where('id',$id)
         ->get()
         ->toArray(); 

     //    dd($rez);

        return view('user.testas_smulkiai', ['testas' => $rez, 'sumine' => $rez_sum, 'test_id' => $id]);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function rezults(Request $request) {

        $ir_sk = '\Config'::get('constants.puslapiavimas.rez_row_per_page');
        $propertiesRez= Rezultatai::query();
        $adminas=(Auth::user()->is_admin);
        $nuo=(empty($request->data_nuo)) ? date('Y-m-d', strtotime(now().'-31 day')) : $request->data_nuo;
        $iki=(empty($request->data_iki)) ? date('Y-m-d', strtotime(now().'+1 day')) : date('Y-m-d', strtotime($request->data_iki.'+1 day')) ;
        $user = Auth::id();
        $c = empty(Auth::user()->centras) ? '99' : Auth::user()->centras;
        $centras=empty($request->centras) ? '' : $request->centras;

        $user_list = Rezultatai::distinct('users_id')->orderBy('users_id')->get();
        $k=1;      
        $k = $request->kontr;

       
        // $propertiesRez->whereBetween('testas_pradzia',[$nuo,$iki])
        //     ->orderBy('testas_pradzia','desc')
        //     ->paginate(50);
//dd($propertiesRez);

         if($adminas && $request->get('kontr') != 0) {
            $Rezultatai = Rezultatai::whereBetween('testas_pradzia',[$nuo,$iki])->orderBy('testas_pradzia','desc')
            ->where('users_id',$k)
            ->paginate(20);
            }
            else {
                $Rezultatai = Rezultatai::whereBetween('testas_pradzia',[$nuo,$iki])->orderBy('testas_pradzia','desc')
              //  ->where(USER::get('centras'), $centras)
                ->paginate(20);
            };
           //  dd($Rezultatai);

        //$rez=$propertiesRez->get();
//return compact('rez');
   //     dd( $rez);

         if (!$adminas) {
         $Rezultatai = Rezultatai::whereBetween('testas_pradzia',[$nuo,$iki])
             ->orderBy('testas_pradzia', 'desc')
             ->where('users_id', $user)
             ->paginate($ir_sk) ;
         }
        if($c ==99) {
            $useriai = USER::orderBy('name')->get();
        } else {
            $useriai = USER::where('centras','=',"{$c}")->orderBy('name')->get();
        };

       
       // dd($Rezultatai);

    

        return view('user.rezultatai', ['rez' => $Rezultatai,   'nuo' =>$nuo,  'iki' => $iki, 'usrs_centras' => $useriai,'kontr' => $k ] );
    }



    public function endtest(Request $request) {

       date_default_timezone_set('Europe/Vilnius');
        $id = $request->id;
        
        
        $kl=$request->tst_kl_ids;  //klausimų id'ų masymas
       

        $viso_kl=sizeof($kl);   // klausimų skaičius teste
        $atsakyta=0;
        $neatsakyta=0;

        foreach ($kl as $kl_id) {

            $testo_ats_0='';
            $testo_ats_1='';
            $teisingas=0;
/// Kontrolieriaus atsakymai            
            if (isset($request->$kl_id[1])){
                for ($j =1; $j <= 4;$j++){
                    switch (isset( $request->$kl_id[1][$j]) ) {
                        case true:
                            if($request->$kl_id[0][$j] == $request->$kl_id[1][$j]  ){
                                $teisingas++;
                            }
                            $tt=$request->$kl_id[1][$j];
                            break;
                        case false:
                            if($request->$kl_id[0][$j] == 0){
                                $teisingas++;
                            }
                            $tt='0';
                        default:
                            # code...
                            break;
                    }     
                    $testo_ats_1=$testo_ats_1.$tt; 
                }
            }
///  -- Teisingi atsakymai
            if (isset($request->$kl_id[0])){
                for ($j =1; $j <= 4;$j++){
                    $testo_ats_0=$testo_ats_0.$request->$kl_id[0][$j]; 
                }
            }

            DB::table('testas')
            ->where('test_klaus_id', $kl_id)
            ->where('test_testas_id',$id)
            ->update([  'test_atsakymas' => $testo_ats_0, 
                        'test_kontr_ats' => $testo_ats_1,
                        'test_vertinimas' =>($teisingas == 4 ? 1:0) ]);

            if ($teisingas == 4) { 
                $atsakyta++;
            } ;
    
            $teisingas=0;
      
        }
        $pazangumas= round($atsakyta*100/$viso_kl,1);

        DB::table('rezultatais')
        ->where('id', $id)
        ->update([  'testas_pazangumas' => $pazangumas, 
                    'testas_teisingi' => $atsakyta,
                    'testas_klaidingi' => $viso_kl-$atsakyta,
                    'testas_pabaiga' =>date('Y/m/d H:i:s', time())]);

        $rez = DB::table('rezultatais')
        ->where('id',$id)
        ->get()
        ->toArray(); 




        return view('user.testasend', ['rez_sum' => $rez, 'test_id' => $id]);
    }

}
