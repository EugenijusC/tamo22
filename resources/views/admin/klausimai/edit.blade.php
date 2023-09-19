@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Klausimo taisymas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>

<div class="container mt-2">
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> </h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('klausimai.update', $klaus->id )}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="klausimas">Klausimas</label>
                                    <textarea class="form-control" rows="3" placeholder="Tekstas..." name="klausimas" id="klausimas" >
                                        {{ $klaus->klaus_pavadinimas }}
                                    </textarea>
                                </div>

                                @for ($j =1; $j <= 4;$j++)
                                <div class="form-group">
                                    <label for="Atsakymas{{ $j}}">Atsakymas{{$j }}</label>
                                    <textarea class="form-control" rows="3" placeholder="Tekstas..." name="atsakymas1" id="atsakymas1">
                                    {{ $klaus->{'klaus_ats'.$j} }} 
                                    </textarea> 
                                </div>
                                @endfor
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Išsaugoti</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
</div>
@endsection