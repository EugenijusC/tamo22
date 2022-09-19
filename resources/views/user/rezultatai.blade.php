
@extends('layout')

@section('title')Rezultatai @endsection

@section('header_inc')
    <style>
        .row > div {
            flex: 1;
            color: #212529;
            align-items: center;

        }
        .row{
            align-items: center;
            border-radius: 5px;
            background: rgba(0,0,0, .03);
            padding: 0;
            margin: 0;
        }
        .pirmas{
            background: var(--bs-green);
        }
        .pirmas .col{
            color: whitesmoke;
        }
        .islaikytas{
            background: var(--bs-green);
        }
        .neislaikytas{
            background: var(--bs-danger);
        }
    </style>
@endsection

@section('main_content')
    <h1>Testų rezultatai</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container text-center">
    <form method="get" action="{{ route('rezults') }}">
        @csrf
        <div class="row row-cols-4">
        <div class="col-md-3">
            <input type="date" name="data_nuo" id="data_nuo" placeholder="Nuo" class="form-control" value="{{ $nuo }}" />
        </div>
        <div class="col-md-3">
            <input type="date" name="data_iki" id="data_iki" placeholder="Iki" class="form-control" value="{{ $iki }}" />
        </div>
        

        @if (count($usrs_centras))
        <div class="col-md-3">
            <select name="kontr" class="form-control" style="text-align-last: center;">
            <option value="0">--Visi kontrolieriai--</option>
                @foreach($usrs_centras as $js) 
                    <option value="{{ $js->id }}" @if ( $kontr == $js->id) selected="selected" @endif>
                        {{ $js->name }} </option> 
                @endforeach
            </select>
        </div>
        @endif

        <div class="col-md-3">
            <select class="form-control" name="centras" style="text-align-last: center;">
                          <option value="99" @if ( $centras === '99') selected="selected" @endif>--Visi centrai--</option>
                          <option value="00" @if ( $centras === '00') selected="selected" @endif>Tuvlita</option>
                          <option value="01" @if ( $centras == '01') selected="selected" @endif>Skirlita</option>
                          <option value="02" @if ( $centras == '02') selected="selected" @endif>Kauno TAC</option>
                          <option value="03" @if ( $centras == '03') selected="selected" @endif>Marijampolės TAC</option>
                          <option value="04" @if ( $centras == '04') selected="selected" @endif>Klaipėdos TAC</option>
                          <option value="05" @if ( $centras == '05') selected="selected" @endif>Tauragės TAC</option>
                          <option value="06" @if ( $centras == '06') selected="selected" @endif>Šiaulių TAC</option>
                          <option value="07" @if ( $centras == '07') selected="selected" @endif>Telšių TAC</option>
                          <option value="08" @if ( $centras == '08') selected="selected" @endif>Panevėžio TAC</option>
                          <option value="09" @if ( $centras == '09') selected="selected" @endif>Utenos TAC</option>
            </select>
        </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Ieškoti</button>

    </form>




    <br>  <br>
    <h1>Rezultatai</h1>

<!-- <span class="badge bg-danger">ffffaaw er er <i class="fa fa-thumbs-up"></i></span> -->
</div>
    <div class="container-xxl pirmas px-0">
        <div class="row row-cols-6 fs-4 border-bottom">
            <div class="col text-center ">Vardas</div>
            <div class="col text-center ">Data</div>
            <div class="col  text-center">Pažangumas</div>
            <div class="col  text-center">Teisingi </div>
            <div class="col  text-center">Klaidingi</div>
            <div class="col  text-center">Centras</div>
            <div class="col  text-center">&nbsp</div>
        </div>
    </div>

    @foreach($rez as $el)
      
        <div class="container-xxl bg-white px-0 ">
            <div class="row row-cols-6 border-bottom">
                <div class="col text-center ">{{ $el->users['name'] }}</div>
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
                <div class="col  text-center"><a href=" {{ route('rezults_smulkiai',$el->id) }}" class="btn btn-primary">Smulkiau</a></div>
            </div>
        </div>


    @endforeach

        <div class="bg-white px-4 py-3 nav-link center">
           {{ $rez->appends(['data_nuo' => request()->data_nuo,'data_iki' => request()->data_iki, 'kontr' => request()->kontr,'centras' => request()->centras  ])->links() }}
        </div>
    
     


    <script>
        Date.prototype.addDays = function(days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        }
         const  dataNuo = document.getElementById('data_nuo');
         const  dataIKI = document.getElementById('data_iki');
        // dataNuo.innerHTML= now();
        // if(!dataNuo.innerText ){
         const  date123 = new Date();
         if(!dataNuo.valueAsDate ) {
            //console.log('dataNuo.innerText: ', dataNuo.valueAsDate);
            dataNuo.valueAsDate  = date123.addDays(-30);
         }
        // }
        //
        if(!dataIKI.valueAsDate ) {
            dataIKI.valueAsDate = date123;
        }
      //  console.log( navigator.connection.downlink);
    </script>


    {{--<script src="{{ asset('assets/admin/js/admin.js') }}"></script>--}}
@endsection
