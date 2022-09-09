@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vartotojai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Pradžia</a></li>
                        <!-- <li class="breadcrumb-item active">Blank Page</li> -->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>


    <div class="card-body">
        <!-- <a href="{{ route('kontaktai.create') }}" class="btn btn-primary mb-3">Pridėti klausimą</a> -->
        <a href="/register" class="btn btn-primary mb-3 buttonas" data-count="{{ $users->total() }}">Pridėti vartotoją</a>

    @if (count($users))

            <div class="card-header">
                <div class="card-tools">
                <form class="form-inline" method="get" action="{{ route('search') }}">
                
                <select class="form-control" name="centras" style="width: 300px;text-align-last: center;">
                          <option value="-visi-">--Pasirinkite centrą--</option>
                          <option value="0">Tuvlita</option>
                          <option value="1">Skirlita</option>
                          <option value="2">Kauno TAC</option>
                          <option value="3">Marijampolės TAC</option>
                          <option value="4">Klaipėdos TAC</option>
                          <option value="5">Tauragės TAC</option>
                          <option value="6">Šiaulių TAC</option>
                          <option value="7">Telšių TAC</option>
                          <option value="8">Panevėžio TAC</option>
                          <option value="8">Utenos TAC</option>

                </select>

                    <div class="input-group input-group-sm" style="width: 150px;">
                 
                    <input type="text" name="usr_search" id="usr_search" class="form-control float-right  @error('usr_search') is-invalid @enderror"  placeholder="Ieškoti"
                    style="height: calc(2.25rem + 2px);">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
                </form>
              </div>

             

    <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 40px">Vardas</th>
                      <th >El.paštas</th>
                      <th>Centras</th>
                      <th>Adminas</th>
                      <th>Veiksmai</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->centras }}</td>
                        <td>{{ $user->is_admin }}</td>
 
                        <td>
                            <a href="{{ route('useriai.edit',$user->id) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                            <form action="{{ route('useriai.destroy', $user->id) }}" method="post" class="float-left">
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
            <p> Nėra rezultatų/p>
    @endif  
    </div>
    <div class="card-footer my-0">
            <div class="row my-0">
                <div class="col-sm-6 my-0">
                {{ $users->links() }}
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
                        Viso: {{ $users->total() }}
                    </ol>
                </div>
            </div>
        </div>

    
</div>
<script>
    const ss = document.querySelector("#usr_search");
    
    ss.addEventListener('keyup', () => {
        console.log(ss.value);
      //  window.location.href = " {{ route('search')}}?usr_search=jonas";
    })
    
</script>

@endsection