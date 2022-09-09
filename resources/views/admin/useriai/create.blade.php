@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Naujas kontaktas</h1>
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
                            <h3 class="card-title">Naujas kontaktas </h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('kontaktai.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Kontaktas</label>
                                    <input type="text" name="email"
                                           class="form-control @error('email') is-invalid @enderror" id="email"
                                           placeholder="el.paštas">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Tema</label>
                                    <input type="text" name="subject"
                                           class="form-control @error('subject') is-invalid @enderror" id="subject"
                                           placeholder="Tema">
                                </div>
                                <div class="form-group">
                                    <label>Žinute</label>
                                    <textarea class="form-control" rows="3" placeholder="Tekstas..." name="message" id="message"></textarea>
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