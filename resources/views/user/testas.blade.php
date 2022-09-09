@extends('user.layouttest')

@section('title')Testas @endsection

@section('head_script')
{{--kol kas tuscia--}}

<link rel="stylesheet"  href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<style>


    .swiper-slide img {
        display: block;
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .swiper-pagination-bullet {
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        font-size: 12px;
        color: #000;
        opacity: 1;
        background: rgba(0, 0, 0, 0.2);
        z-index: 5;
    }

    .swiper-pagination-bullet-active {
        color: #ffffff;
        background: #007aff;
    }
    .noanswer{
        background: #95124e;
    }
    
    .swiper-pagination{
       bottom:0; 
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
<form action="/endtest" method="post" accept-charset="utf-8" autocomplete="off" class="form_test">

@csrf
@section('progress')
    <nav class="main-nav align-items-center">
    <div class="progress " style="width: 80vw; height: 30px;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>
    <div class="ps-5 pt-0 mt-0">
        {{--<a class="btn btn-warning" href="/endtest" >Baigti testą</a>--}}
        <button class="btn btn-warning" type="submit" class="btn btn-success">Baigti testą</button>
    </div>

    </nav>

@endsection



@section('main_content')

<input hidden name='id' type='text' value={{ $id }}></input>
<input hidden name='laikas' type='text' value={{ $laikas }}></input>

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
        <fieldset>
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->



            @foreach ($kl as $el )


                <div class="swiper-slide">

                    <!-- @php if(is_null($el->klaus_foto1)) { $foto1 = '1x1.png';} else{ $foto1 = $el->klaus_foto1; } @endphp -->
                    <div class="root"  >
                    <h2 data-kl-nr="{{$i}}" data-kl-id="{{$el->test_klaus_id}}" data-bs-toggle="tooltip"  title="Grupė: {{$el->klaus_gr_id }}, {{ $el->klaus_update }}" >{{ $i }}. {{ $el->klaus_pavadinimas }} </h2>
                    <input hidden name='tst_kl_ids[{{ $i }}]' value="{{$el->test_klaus_id }}" >
                    <!-- @php
                            $numbers = range(1, 4);
                            shuffle($numbers);
                    @endphp -->
<div class="containerKl">
                    @for ($j =1; $j <= 4;$j++)

                        <label class="task" >
                            <input type="hidden"  name="{{$el->test_klaus_id}}[0][{{$j}}]" value="{{$el->{'klaus_teisingas'.$atsak[$j-1]} }}"  />
                           
                            <!-- <input type="hidden" name="kl_{{$el->test_klaus_id}}[{{$j}}]" value="0"/> -->
                            <input type="checkbox" name="{{$el->test_klaus_id}}[1][{{$j}}]"  value="1"/>

                            <!-- <input type="checkbox" data-atsak ="{{$el->test_klaus_id}}" data-kl-atsak ="{{ $el->{'klaus_teisingas'.$numbers[$j-1]} }}" name="atsakymai[{{$i}}][{{$j}}]" value="1"  /> -->
                            
                            <i class="fas fa-check"></i>
                            <span class="atsak"  >{{$el->{'klaus_ats'.$atsak[$j-1]} }}</span>
                        </label>

                    @endfor
                        {{--<input type="hidden" name="checkboxName" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">--}}
                    <div class="containerFoto">
                    @for ($j =1; $j <= 4;$j++)

                        @if(!is_null($el->{'klaus_foto'.$j}) and $j != 4)
                        
                            <div class="post" >
                                <img src="../storage/{{$el->klaus_gr_id}}/{{$el->{'klaus_foto'.$j} }}" alt="Pav.{{$j}}" class="zooming" />
                                <div class="post-text"><h2>{{$j}} pav.</h2></div>
                            </div>
                        @endif

                        @if(!is_null($el->{'klaus_foto'.$j}) and $j==4)
                        
                            <div class="post4" >
                                <img src="../storage/{{$el->klaus_gr_id}}/{{$el->{'klaus_foto'.$j} }}" alt="Pav.{{$j}}" class="zooming" />
                                <div class="post-text"><h2>{{$j}} pav.</h2></div>
                            </div>
                        @endif

                        @endfor
                    </div>
</div>                   
                </div>
                </div>

                @php
                    $i++;
                @endphp
            @endforeach

        </div>


        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-pagination"></div>
    </fieldset>
       
    </div>
    </form>
@endsection


@section('sciptams')
    <script>
        
    </script>
@endsection