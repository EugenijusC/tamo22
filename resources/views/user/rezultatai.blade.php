
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
            max-width: 1520px;
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
.containerP{
    margin:2em;
    text-align: center;
    display: none;
  }
  
  .loader {
    margin:auto;
    margin-top: 10px;
    margin-bottom: 10px;
    border: 6px solid #bdc3c7;
    width: 50px;
    height: 50px;
    border-top-color: #1abc9c;
    border-bottom-color: #3498db;
    border-radius: 50%;
    animation: coloredspin 2s linear infinite;
  }
  
  @keyframes spin {
    0%{
      transform: rotate(0deg);
    }
    100%{
      transform: rotate(360deg);
    }
  }
  
  @keyframes coloredspin {
    0%{
      transform: rotate(0deg) scale(1.5);
      border-top-color: #1abc9c;
      border-bottom-color: #1abc9c;
    }
    25% {
      border-top-color: #2ecc71;
      border-bottom-color: #2ecc71;
    }
    50% {
      transform: rotate(360deg) scale(0.5);
      border-top-color: #3498db;
      border-bottom-color: #3498db;
    }
    75% {
      border-top-color: #9b59b6;
      border-bottom-color: #9b59b6;
    }
    100%{
      transform: rotate(720deg) scale(1.5);
      border-top-color: #1abc9c;
      border-bottom-color: #1abc9c;
    }
  }
  
  @keyframes appear {
    0%{
      opacity: 0;
    }
    100%{
      opacity: 1;
    }
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
    <form method="get" action="{{ route('rezults') }}"  >
        @csrf
        <div class="row row-cols-4">
        <div class="col-md-3">
            <input type="date" name="data_nuo" id="data_nuo" placeholder="Nuo" class="form-control" value="{{ $nuo }}" />
        </div>
        <div class="col-md-3">
            <input type="date" name="data_iki" id="data_iki" placeholder="Iki" class="form-control" value="{{ $iki }}" />
        </div>
        

        @if (count($usrs_centras)) 
        @php
          $kv='Jonas';
        @endphp
        <div class="col-md-3">
            <select name="kontr" class="form-control" style="text-align-last: center;">
            <option value="0">--Visi kontrolieriai--</option>
                @foreach($usrs_centras as $js) 
                    <option value="{{ $js->id }}" @if ( $kontr == $js->id  ) selected="selected" @php $kv=$js->name; @endphp;  @endif>
                        {{ $js->name }} </option> 
                @endforeach
            </select>
        </div>
        @endif

        <div class="col-md-3">
            <select class="form-control" name="centras" style="text-align-last: center;">
                          <option value="99" @if ( $centras === '99') selected="selected" @endif>--Visi centrai---</option>
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
        <button type="submit" class="btn btn-success searchButton">Ieškoti</button>
        <a href="{{ route('export_usr',['nuo'=>$nuo, 'iki'=>$iki, 'centras'=>$centras, 'kontr'=>$kontr, 'kontr_vardas'=>$kv]) }}" class="btn btn-xs btn-info pull-right d-nonae">Excel</a>

    </form>
 <br>
    <h1>Rezultatai</h1>
    <div class="containerP">
        <div class="loader"  id="animationWindow"></div>
    </div>
<!-- <span class="badge bg-danger">ffffaaw er er <i class="fa fa-thumbs-up"></i></span> -->
</div>

@include('user.rez_table',$rez)



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

      const progresBAR = document.querySelector(".containerP");
      const lentele = document.querySelector(".containerLent");
      const paieska_btn = document.querySelector(".searchButton");
      paieska_btn.addEventListener('click',() => {
                progresBAR.style.cssText = `
                    display:flex;
                    `;
                lentele.style.cssText = `
                    display:none;
                    `;
                
                });
      

    </script>


    {{--<script src="{{ asset('assets/admin/js/admin.js') }}"></script>--}}
@endsection
