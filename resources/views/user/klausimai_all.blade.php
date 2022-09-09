
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
    <form method="post" action="/">
        @csrf
        <input type="date" name="data_nuo" id="data_nuo" placeholder="Nuo" class="form-control" hidden ><br>
        <input type="date" name="data_iki" id="data_iki" placeholder="Iki" class="form-control" hidden value=""><br>

        <div class="dropdown" >
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown link
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
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
    {{-- @if ( sizeof($rez) >= \Config::get('constants.puslapiavimas.rez_row_per_page') );   --}}
        <div class="bg-white px-4 py-3 align-items-center justify-content-between">
           {{ $rez->links() }}
        </div>
    
     


    <script>
        Date.prototype.addDays = function(days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        }
         let  dataNuo = document.getElementById('data_nuo');
        // dataNuo.innerHTML= now();
        // if(!dataNuo.innerText ){
         let  date123 = new Date();
         dataNuo.valueAsDate  = date123.addDays(-30);
        // }
        //
         document.getElementById('data_iki').valueAsDate = date123;
        console.log( navigator.connection.downlink);
    </script>


    {{--<script src="{{ asset('assets/admin/js/admin.js') }}"></script>--}}
@endsection
