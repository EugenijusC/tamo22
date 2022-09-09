@extends('layout')

@section('title')Login @endsection

@section('main_content')
    <div class="row my-5">
<p class="h4 text-warning my-4"> Prisijunkite</p>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


<form class="col-md-4 gy-3" action="{{ route('login') }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    {{--<div class="mb-3">--}}
        {{--<div class="form-check">--}}
            {{--<input type="checkbox" class="form-check-input" id="dropdownCheck2">--}}
            {{--<label class="form-check-label" for="dropdownCheck2">--}}
                {{--Remember me--}}
            {{--</label>--}}
        {{--</div>--}}
    {{--</div>--}}
    <button type="submit" class="btn btn-primary">Jungtis</button>
</form>


</div>



@endsection
