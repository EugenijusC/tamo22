@extends('layout')

@section('title')Pagrindinis @endsection

@section('main_content')
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron bg-warning">
            <div class="container">
                <h1 class="display-2 pt-5 ps-5 ">Vaizduotė yra daugiau nei žinios!</h1>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p><a class="btn btn-danger btn-lg" href="{{ route('logout') }}" role="button">Išeiti »</a></p>
                <p>&nbsp</p>
                <p>&nbsp</p>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-6 text-start">
                    <h2>Klausimyno naujienos</h2>
                    <p>Naujienų nėra </p>
                    <!-- <p><a class="btn btn-secondary" href="#" role="button">Smulkiau »</a></p> -->
                </div>
                <div class="col-md-6 text-end">
                    <h2>Užduoti klausimą, palikti pastebėjimą</h2>
                    <p> </p>
                    <p><a class="btn btn-secondary" href="/contacts" role="button">Pereiti »</a></p>
                </div>
                <!-- <div class="col-md-4">
                    <h2>Naujieno</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">Smulkiau »</a></p>
                </div> -->
            </div>

            <hr>

        </div> <!-- /container -->

    </main>

@endsection
