@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Klausimo taisymas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tema "{{ $kontaktas->subject }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('kontaktai.update', $kontaktas->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Kontaktas</label>
                                    <input type="text" name="email"
                                           class="form-control @error('email') is-invalid @enderror" id="email"
                                           placeholder="el.paštas" value="{{ $kontaktas->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Tema</label>
                                    <input type="text" name="subject"
                                           class="form-control @error('subject') is-invalid @enderror" id="subject"
                                           placeholder="Tema" value="{{ $kontaktas->subject }}">
                                </div>
                                <div class="form-group">
                                    <label for="message" >Klausimas</label>
                                    <textarea 
                                        class="form-control" rows="3" name="message" id="message" placeholder="Žinutė..." 
                                    >{{$kontaktas->message}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="atsakymas" >Atsakymas</label>
                                    <textarea 
                                        class="form-control" rows="3" name="atsakymas" id="atsakymas" placeholder="Atsakymas..." 
                                    >{{$kontaktas->atsakymas}}</textarea>
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
    <!-- /.content -->
</div>
@endsection

