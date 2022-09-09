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
        background: url(../../../storage/Flat_tick_icon_green.svg) center / 50px no-repeat;
    }
    .red_check{
        outline: 0;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 1px solid rgb(46,25,136);
        background: url(../../../storage/Flat_tick_icon_red.svg) center / 50px no-repeat;
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


@section('main_content')


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
        <h1 class="display-5 py-2">Rezultatai {{ $vardas  }}</h1>
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
                        <a href='../../../storage/isaiskinimas/{{ $el->klaus_www_link }}' target='_blank' class='atsak'  >  
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
                                <img src="../../../storage/{{$el->klaus_gr_id}}/{{$el->{'klaus_foto'.$j} }}" alt="Pav.{{$j}}" class="zooming" />
                                <div class="post-text"><h2>{{$j}} pav.</h2></div>
                            </div>
                        @php } @endphp

                        @php if(!is_null($el->{'klaus_foto'.$j}) and $j==4){ @endphp
                            <div class="post4" >
                                <img src="../../../storage/{{$el->klaus_gr_id}}/{{$el->{'klaus_foto'.$j} }}" alt="Pav.{{$j}}" class="zooming" />
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