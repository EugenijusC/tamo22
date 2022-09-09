@extends('layout')

@section('title')Klausimai @endsection

@section('main_content')
    <h1>Klauskite</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/contacts/check">
        @csrf
        <input type="email" readonly name="email" id="email" placeholder="El.paštas" class="form-control" value='{{ Auth::user() ? Auth::user()->email." (".Auth::user()->name.")"  : "" }}'><br>
        <input hidden type="text" name="name" id="name" value='{{ Auth::user() ? Auth::user()->name : "Noname" }}'>
        
        <input type="text" name="subject" id="subject" placeholder="Tema" class="form-control"><br>
        <textarea name="message" id="message" class="form-control" placeholder="Žinutė"></textarea><br>
        <button type="submit" class="btn btn-success">Siųsti</button>
    </form>
    <br>  <br>  <br>
    <h1>Visi klausimai</h1>


    <br>
    @foreach($contacts as $el)
        <div class="alert alert-warning">
            <h5>{{ $el->subject }}</h5>
            <b>{{ $el->email }}</b>
            <p>{{ $el->message }}</p>
            <p>{{ $el->created_at }}</p>
        </div>

        <div class="success ps-5">
        <div class="bg-success">
            Atsakymas:<h5>
            <p>{{ $el->atsakymas }}</p>
        </div>
        </div>


    @endforeach
    {{-- @if ( sizeof($contacts) >= \Config::get('constants.puslapiavimas.contacts_row_per_page') ) --}}
    <div class="bg-white px-2 py-1 align-items-center justify-content-center d-flex">
        {{ $contacts->links() }}
    </div>



    <script>//selecting the input.
        const input = document.querySelector('#message');
        
        //prevent the user to paste text by using the paste eventListener.
        input.addEventListener("paste", function(e){
            e.preventDefault()
        })
        
    </script>
<!-- 
    <script src="{{ asset('assets/admin/js/admin.js') }}"></script> -->
@endsection
