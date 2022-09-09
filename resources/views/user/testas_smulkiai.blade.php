@extends('user.layouttest')

@section('title')Testas smulkiai @endsection

@section('head_script')
{{--kol kas tuscia--}}



<style>

    .green_check{
        outline: 0;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 1px solid rgb(46,25,136);
        background: url(../storage/Flat_tick_icon_green.svg) center / 50px no-repeat;
    }
    .red_check{
        outline: 0;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 1px solid rgb(46,25,136);
        background: url(../storage/Flat_tick_icon_red.svg) center / 50px no-repeat;
    }    
    .circle{
        outline: 0;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 1px solid rgb(46,25,136);
        background: none;
    } 
        
    
    .noanswer{
        background: #95124e;
    }

    .islaikytas{
        background: var(--bs-green);
        color: #FFFFFF;
    }
    .neislaikytas{
        background: var(--bs-danger);
    }
    a:link {
        text-decoration: none;
    }
    .nuoroda:hover {
        background: var(--bs-green);
        font-size: 1.1rem;
        color: var(--bs-primary);
        background: var(--bs-white);
    }
    .atsak, .atsak_null{
        padding-left:0;
        margin-left: 8px;
    }
    .task_rez{
        display: flex;
        align-items: center;
        padding: 10px 30px;
        z-index: 1100;
    }
    .post {
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        background: none;
        border: none;
}


</style>

@endsection

@section('progress')
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-6 bg-secondary bg-gradient text-white border-bottom shadow-sm" style="background: #2d048d; padding: .1rem; max-height: 80px;">
    <img src="../assets/logo.svg" style="color: #fafafa; width: 80px; height: 80px;"/>
    <h5 class="my-0 mr-md-auto fw-bold">TAMO</h5>

    <nav class="nav justify-content-end" style="width: 80vw;">
        <a class="p-2 text-white" href="/start">Pagrindinis</a>
        <a class="p-2 text-white" href="/test">Testas</a>
        <a class="p-2 text-white" href="/rezults">Rezultatai</a>
        <a class="p-2 text-white" href="/contacts">Klausimai</a>
        <img src="../storage/avatar.png" style="width: 32px;height: 32px;"/>
        <a class="p-2 text-white" href="#">{{ Auth::user() ? Auth::user()->name : "Noname" }}</a>

    </nav>


    <a class="btn btn-warning" href="/logout">Išeiti</a>
</div>
@endsection



@section('main_content')
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class='px-4'>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @php
        $i = 1;
    @endphp

    <div>
        <h1 class="display-4 py-2">Rezultatai</h1>
        <p>&nbsp</p>
    </div>
    

    @foreach ($sumine as $sum)
    @php
        $atsak=str_split( $sum->rez_atsak);
      //  echo  $sum->rez_atsak;
      //  print_r($atsak);
    @endphp
    
    
    <div class="alert alert-primary d-flex align-items-center justify-content-between" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
        <div class="h3">
            Testas atliktas: {{ $sum->testas_pradzia }}  -  {{ $sum->testas_pabaiga }}
        </div>
        <div >
            <p class="btn-w btn btn-success btn-lg px-5 py-3" >Teisingi: {{ $sum->testas_teisingi }}&nbsp</p>
            <p class="btn-w btn btn-danger btn-lg px-5 py-3">Klaidingi: {{ $sum->testas_klaidingi }}&nbsp</p>
            <p class="btn-w btn btn-primary btn-lg px-5 py-3">Pažangumas: {{ $sum->testas_pazangumas }}&nbsp</p>
        </div> 
        
    </div>
   
    @endforeach


    @foreach ($testas as $el )
                <div class="pt-3"  >
                @if ($el->test_vertinimas == 1)
                    <h2 data-kl-nr="{{$i}}" data-kl-id="{{$el->test_klaus_id}}" data-bs-toggle="tooltip"  title="Grupė: {{$el->klaus_gr_id }}, {{ $el->klaus_update }}" class='islaikytas'>{{ $i }}. {{ $el->klaus_pavadinimas }} </h2>
                @else
                    <h2 data-kl-nr="{{$i}}" data-kl-id="{{$el->test_klaus_id}}" data-bs-toggle="tooltip"  title="Grupė: {{$el->klaus_gr_id }}, {{ $el->klaus_update }}" class='neislaikytas' >{{ $i }}. {{ $el->klaus_pavadinimas }} </h2>

                @endif


                
        <!-- Atsakymų blokas -->
        @for ($j =1; $j <= 4;$j++)
            <label class="task_rez" >
                <!-- Burbulai -->
                @if (isset($el->test_kontr_ats[$j-1]) && $el->test_kontr_ats[$j-1] == 1 && $el->test_atsakymas[$j-1] == 1)
                    <div class='green_check'></div>
                @elseif  (isset($el->test_kontr_ats[$j-1]) && $el->test_kontr_ats[$j-1] == 1 && $el->test_atsakymas[$j-1] == 0)
                    <div class='red_check'></div>
                @else
                   <div class='circle'></div>
                @endif  
                
                <!-- Tekstai -->
                @if (isset($el->test_atsakymas[$j-1]) && $el->test_atsakymas[$j-1] == 1)
                    
                   @if (isset($el->klaus_www_link) && ($el->klaus_www_link)!='' )  <!-- jei yra nuoroda prie klausimo -->
                        <a href='../storage/isaiskinimas/{{ $el->klaus_www_link }}' target='_blank' class='atsak'  >  
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                <path d="M22 24h-20v-24h14l6 6v18zm-7-23h-12v22h18v-16h-6v-6zm3 15v1h-12v-1h12zm0-3v1h-12v-1h12zm0-3v1h-12v-1h12zm-2-4h4.586l-4.586-4.586v4.586z"/>
                            </svg>
                            <span class="islaikytas nuoroda" data-bs-toggle="tooltip"  title="Išaiskinimas. {{ $el->klaus_www }}"  >{{ $el->{'klaus_ats'.$atsak[$j-1]} }}</span>
                        </a>
                    @else 
                        <span class="islaikytas atsak_null" data-bs-toggle="tooltip"  >{{ $el->{'klaus_ats'.$atsak[$j-1]} }}</span>
                    @endif

                @else
                    <span class="atsak"  >{{ $el->{'klaus_ats'.$atsak[$j-1]} }}</span>
                @endif
            </label>
            @endfor
         <!-- Atsakymų blokas END -->
        
           
         
         
            @if ( isset($el->klaus_foto1) || isset($el->klaus_foto2) || isset($el->klaus_foto3) || isset($el->klaus_foto4) )  
                 <div class="containerFoto">
                    @for ($j =1; $j <= 4;$j++)

                        @php 
                            if(!is_null($el->{'klaus_foto'.$j}) and $j<4){ 
                        @endphp
                            <div class="post" >
                                <img src="../storage/{{$el->klaus_gr_id}}/{{$el->{'klaus_foto'.$j} }}" alt="Pav.{{$j}}" class="zooming" />
                                <div class="post-text"><h2>{{$j}} pav.</h2></div>
                            </div>
                        @php } @endphp

                        @php if(!is_null($el->{'klaus_foto'.$j}) and $j==4){ @endphp
                            <div class="post4" >
                                <img src="../storage/{{$el->klaus_gr_id}}/{{$el->{'klaus_foto'.$j} }}" alt="Pav.{{$j}}" class="zooming" />
                                <div class="post-text"><h2>{{$j}} pav.</h2></div>
                            </div>
                        @php } @endphp


                        @endfor
                    </div>
                 @endif

                </div>

                @php
                    $i++;
                @endphp
            @endforeach

    </div>
    <div class="scroll"></div>
        <button class="goTop fas fa-arrow-up"></button>
    </div>
       

@endsection