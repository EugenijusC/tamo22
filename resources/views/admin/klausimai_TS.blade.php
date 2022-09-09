
@extends('admin.layouts.klaus')

@section('content')

      
        <!-- /.card -->
        <a href="{{ url('/klausimai') }}" target="_blank" class="brand-link">
            <img src="{{ asset('../storage/klaustukas.svg') }}"
                 alt="Klausimai"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
        </a>
       

@endsection