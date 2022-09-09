
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
<div class="col-4">
    <form method="get" action="{{ route('rezults') }}">
        @csrf
        <div class="row">
        <div class="col-sm-9">
            <input type="date" name="data_nuo" id="data_nuo" placeholder="Nuo" class="form-control" value="{{ $nuo }}" />
        </div>
        <div class="col-sm-9">
            <input type="date" name="data_iki" id="data_iki" placeholder="Iki" class="form-control" value="{{ $iki }}" />
        </div>
        

        @if (count($usrs_centras))
        <div class="col-sm-9">
            <select name="kontr" class="form-control" style="text-align-last: center;">
            <option value="0">--Visi kontrolieriai--</option>
                @foreach($usrs_centras as $js) 
                    <option value="{{ $js->id }}" @if ( $kontr == $js->id) selected="selected" @endif>
                        {{ $js->name }} </option> 
                @endforeach
            </select>
        </div>
        @endif

        <div class="col-sm-9">
            <select class="form-control" name="centras" style="text-align-last: center;">
                          <option value="all">--Visi centrai--</option>
                          <option value="0">Tuvlita</option>
                          <option value="1">Skirlita</option>
                          <option value="2">Kauno TAC</option>
                          <option value="3">Marijampolės TAC</option>
                          <option value="4">Klaipėdos TAC</option>
                          <option value="5">Tauragės TAC</option>
                          <option value="6">Šiaulių TAC</option>
                          <option value="7">Telšių TAC</option>
                          <option value="8">Panevėžio TAC</option>
                          <option value="8">Utenos TAC</option>
            </select>
        </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Ieškoti</button>

    </form>




    <br>  <br>
    <h1>Rezultatai</h1>

</div>
    <div class="container-xxl pirmas px-0">
        <div class="row row-cols-6 fs-4 border-bottom">
            <div class="col text-center ">Vardas</div>
            <div class="col text-center ">Data</div>
            <div class="col  text-center">Pažangumas</div>
            <div class="col  text-center">Teisingi </div>
            <div class="col  text-center">Klaidingi</div>
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
                <div class="col  text-center"><a href=" {{ route('rezults_smulkiai',$el->id) }}" class="btn btn-primary">Smulkiau</a></div>
            </div>
        </div>


    @endforeach

        <div class="bg-white px-4 py-3 align-items-center justify-content-between">
           {{ $rez->appends(['data_nuo' => request()->data_nuo,'data_iki' => request()->data_iki, 'kontr' => request()->kontr  ])->links() }}
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
