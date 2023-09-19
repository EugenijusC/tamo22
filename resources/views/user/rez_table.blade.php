@if (count($rez))  
<div class="containerLent">
    <div class="container pirmas px-0">
        <div class="row row-cols-4 fs-4 border-bottom">
            <div class="col text-center ">Eil.Nr.</div>
            <div class="col text-center ">Vardas</div>
            <div class="col text-center ">Data</div>
            <div class="col text-center">Pažangumas</div>
            <div class="col text-center">Teisingi </div>
            <div class="col text-center">Klaidingi</div>
            <div class="col text-center">Centras</div>
            <div class="col text-center">Tipas</div>
            <div class="col text-center">&nbsp</div>
        </div>
    </div>

  
    @foreach($rez as $el)
      
        <div class="container bg-white px-0 ">
            <div class="row row-cols-6 border-bottom">
                <div class="col text-center ">{{$loop->iteration}}</div>
                <div class="col text-left ">{{ $el->users['name'] }}</div>
                <div class="col text-center ">{{ $el->testas_pradzia }}</div>
                @php
                    $nesprestas='';
                    if (is_null($el->testas_pazangumas) || !isset($el->testas_pazangumas)){
                        $nesprestas='Nebaigtas';
                    }


                   if ($el->testas_pazangumas < 70 || is_null($el->testas_pazangumas) || !isset($el->testas_pazangumas) ){
                    echo '<div class="col  text-center neislaikytas" >'. $el->testas_pazangumas.$nesprestas.' </div>';
                   }
                   else {
                    echo '<div class="col  text-center islaikytas">'. $el->testas_pazangumas.'</div>';
                   }
                @endphp

               
                <div class="col  text-center">{{$el->testas_teisingi}} </div>
                <div class="col  text-center">{{$el->testas_klaidingi}}</div>
                <div class="col  text-center">{{$el->users['centras']}}</div>
                <div class="col  text-center">{{$el->testas_tipas }}</div>
                <div class="col  text-center"><a href=" {{ route('rezults_smulkiai',$el->id) }}" class="btn btn-primary">Smulkiau</a></div>
            </div>
        </div>


    @endforeach

        <div class="bg-white px-4 py-3 nav-link center">
           {{ $rez->appends(['data_nuo' => request()->data_nuo,'data_iki' => request()->data_iki, 'kontr' => request()->kontr,'centras' => request()->centras  ])->links() }}
        </div>
    </div>
@else
            <p>Nėra rezultatų</p>
@endif    