@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Klausimai</h1>
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


    <div class="card-body">
        <a href="{{ route('kontaktai.create') }}" class="btn btn-primary mb-3">Pridėti klausimą</a>
       
    @if (count($contacts))
    <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 40px">El.paštas</th>
                      <th>Tema</th>
                      <th >Klausimas</th>
                      <th >Atsakymas</th>
                      <th >Data</th>
                      <th>Veiksmai</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->atsakymas }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>
                            <a href="{{ route('kontaktai.edit',$contact->id) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                            <form action="{{ route('kontaktai.destroy', $contact->id) }}" method="post" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Ar tikrai norite istrinti?')">
                                    <i
                                        class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                
             
    </div>
    @else
            <p> Nėra klausimų</p>
    @endif  
    </div>
        <div class="card-footer my-0">
            <div class="row my-0">
                <div class="col-sm-6 my-0">
                {{ $contacts->links() }}
                    {{--<ul class="pagination  my-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>--}} 
                </div>
                <div class="col-sm-6 my-0">
                    <ol class="breadcrumb float-sm-right my-0">
                        Viso: {{ $contacts->total() }}
                    </ol>
                </div>
            </div>
        </div>




</div>
@endsection