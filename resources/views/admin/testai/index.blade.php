@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testai</h1>
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

    @if (count($testai))

            <div class="card-header">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Ieškoti">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

             

    <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 40px">Vardas</th>
                      <th>Data</th>
                      <th >Pažangumas</th>
                      <th >Teisingi</th>
                      <th >Klaidingi</th>
                      <th>Veiksmai</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($testai as $testas)
                    <tr>
                        <td>{{ $testas->id }}</td>
                        <td>{{ $testas->users['name'] }}</td>
                        <td>{{ $testas->testas_pradzia }}</td>
                        <td>{{ $testas->testas_pazangumas }}</td>
                        <td>{{ $testas->testas_teisingi }}</td>
                        <td>{{ $testas->testas_klaidingi }}</td>
                        <td>
                            <!-- <a href="{{ route('testai.edit',$testas->id) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a> -->
                                                    <a href=" {{ route('testas_smulkiai',[$testas->id, $testas->users['name'] ]) }}" target="_blank" class="btn btn-info btn-sm float-left mr-1">Smulkiau</a>

                            <form action="{{ route('testai.destroy', $testas->id) }}" method="post" class="float-left">
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
            <p> Nera testų</p>
    @endif  
    </div>
    <div class="card-footer my-0">
            <div class="row my-0">
                <div class="col-sm-6 my-0">
                {{ $testai->links() }}
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
                        Viso: {{ $testai->total() }}
                    </ol>
                </div>
            </div>
        </div>

    
</div>

@endsection