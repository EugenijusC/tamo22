@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Naujas klausimas</h1>
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
                            <h3 class="card-title">Naujas testo klausimas</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('klausimai.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="klausimas">Klausimas</label>
                                    <!-- <input type="text" name="email"
                                           class="form-control @error('email') is-invalid @enderror" id="email"
                                           placeholder="el.paštas"> -->
                                <!-- </div>
                                <div class="form-group">
                                    <label for="subject">Tema</label>
                                    <input type="text" name="subject"
                                           class="form-control @error('subject') is-invalid @enderror" id="subject"
                                           placeholder="Tema">
                                </div>
                                <div class="form-group">
                                    <label>Žinute</label> -->
                                    <textarea class="form-control" rows="3" placeholder="Tekstas..." name="klausimas" id="klausimas"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="atsakymas1">Atsakymas1</label>
                                    <textarea class="form-control" rows="3" placeholder="Tekstas..." name="atsakymas1" id="atsakymas1"></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="atsakymas2">Atsakymas2</label>
                                    <textarea class="form-control" rows="3" placeholder="Tekstas..." name="atsakymas2" id="atsakymas2"></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="atsakymas3">Atsakymas3</label>
                                    <textarea class="form-control" rows="3" placeholder="Tekstas..." name="atsakymas3" id="atsakymas3"></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="atsakymas4">Atsakymas4</label>
                                    <textarea class="form-control" rows="3" placeholder="Tekstas..." name="atsakymas4" id="atsakymas4"></textarea> 
                                </div>
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