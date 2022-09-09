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
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>


    <div class="card-body">
        <!-- <a href="{{ route('kontaktai.create') }}" class="btn btn-primary mb-3">Pridėti klausimą</a> -->
        
        


    @if (count($users))

    <div class="row mb-2">
        <div class="col-sm-6">  
            <a class="btn btn-warning" href="/admin/useriai">Atgal</a>
        </div>
        <div class="col-sm-6">  
            <h2 class="text-gray text-sm-start " style="text-align: right" >
                Filtras: 
                @if($s)
                    vardas  {{ $s }}
                @endif

                @if($c)
                    , centras {{ $c }}
                @endif

            </h2>

        </div>
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
            <p> Nėra rezultatų</p>
            

                <div class="row mb-2">
            <div class="col-sm-6">  
                <a class="btn btn-warning" href="/admin/useriai">Atgal</a>
            </div>
            <div class="col-sm-6">  
                <h2 class="text-info" style="text-align: right">
                Filtras: 
                @if($s == 'A' )
                    vardas  {{!! $s !!}}
                @endif
                    , centras {{!! $c !!}}</h2>
            </div>
    </div>

    @endif  
    </div>
    <div class="card-footer my-0">
            <div class="row my-0">
                <div class="col-sm-6 my-0">
                {{ $users->appends(['usr_search' => request()->usr_search,'centras' => request()->centras  ])->links() }}
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

@endsection