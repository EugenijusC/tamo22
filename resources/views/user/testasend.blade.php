@extends('layout')

@section('title')Testo rezultatai @endsection


@section('main_content')
    <main role="main">

 
            @foreach ($rez_sum as $rez)
                <input hidden value="{{ $rez->id }}" name="testo_idas">
                <div class="jumbotron" style="background:var(--bs-gray-dark)">
                    <div class="d-flex flex-column flex-md-column align-items-center">
                        <div>
                            <h1 class="display-4 py-5">Rezultatai</h1>
                            <p>&nbsp</p>
                        </div>
                        <div>
                            <p class="btn btn-success btn-lg btn-w px-5 py-3" >Teisingi: {{ $rez->testas_teisingi }}&nbsp</p>
                            <p class="btn-w btn btn-danger btn-lg px-5 py-3">Klaidingi: {{ $rez->testas_klaidingi }}&nbsp</p>
                        </div>

                        <div>
                            <p class="btn btn-secondary  btn-lg px-5 py-3">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPažangumas: {{ $rez->testas_pazangumas }}%&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
                            <p>&nbsp</p>
                        </div>
                        <hr>
                        

                        <div >
                            <div class="col  text-center"><a href=" {{ route('rezults_smulkiai',$rez->id) }}" class="btn btn-outline-light btn-lg align-content-center px-5 py-3">Smulkiau »</a></div>
                        </div>
                        <p>&nbsp</p>
                    </div>
                </div>
            @endforeach




    </main>

@endsection
