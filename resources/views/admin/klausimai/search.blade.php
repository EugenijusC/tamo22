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
                        <li class="breadcrumb-item"><a href="/admin">Pradžia</a></li>
                        <!-- <li class="breadcrumb-item active">Blank Page</li> -->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>


    <div class="card-body">
        <!-- <a href="{{ route('kontaktai.create') }}" class="btn btn-primary mb-3">Pridėti klausimą</a> -->
       
        

    @if (count($klaus))

            <div class="card-header">
            <div class="row mb-2">
        <div class="col-sm-6">  
            <a class="btn btn-warning" href="/admin/klausimai">Atgal</a>
            <a class="btn btn-info" href="{{ route('export_klaus',['grupe'=>$c]) }}" class="btn btn-xs btn-info pull-right d-noneą">Excel</a>
        </div>

        <div class="col-sm-6">  
            <h2 class="text-gray text-sm-start " style="text-align: right" >
                Filtras: 
                @if($s)
                    tekstas:  {{ $s }}
                @endif

                @if($c != '')
                    , grupė: {{ $c }}
                @endif

            </h2>

        </div>
    </div>
            </div>

             

    <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 40px">Grupe</th>
                      <th>Aktualus </th>
                      <th >Tipas</th>
                      <th >Klausimas</th>
                      <th >Atsakymas1</th>
                      <th></th>
                      <th >Atsakymas2</th>
                      <th></th>
                      <th >Atsakymas3</th>
                      <th></th>
                      <th >Atsakymas4</th>
                      <th></th>
                      <th>Veiksmai</th>                   
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($klaus as $klausimas)
                    <tr>
                        <td>{{ $klausimas->id }}</td>
                        <td>{{ $klausimas->klaus_gr_id}}</td>
                        <td>{{ $klausimas->klaus_aktualus }}</td>
                        <td>{{ $klausimas->klaus_testas }}</td>
                        <td><p class="klaus" title="{{ $klausimas->klaus_pavadinimas }}">{{ $klausimas->klaus_pavadinimas }}</p></td>

                        @for ($j =1; $j <= 4;$j++)
                        <td>
                            @if ($klausimas->{'klaus_teisingas'.$j} == 1) 
                                <p class="klaus btn-success" title="{{ $klausimas->{'klaus_ats'.$j} }}">{{ $klausimas->{'klaus_ats'.$j} }}</p>
                            @else
                                <p class="klaus btn-danger" title="{{ $klausimas->{'klaus_ats'.$j} }}">{{ $klausimas->{'klaus_ats'.$j} }}</p>
                            @endif 
                        </td>
                        <td>
                            <div class="container">
                            @if ($klausimas->{'klaus_foto'.$j} ) 
                            <a href="../storage/{{$klausimas->klaus_gr_id}}/{{$klausimas->{'klaus_foto'.$j} }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0069d9" class="bi bi-image" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                </svg>
                            </a>
                            @endif
                            </div>
                           
                        </td>
                        @endfor

                        
                        
                        <td>
                            <a href="{{ route('klausimai.edit',$klausimas->id) }}"
                                    class="btn btn-info btn-sm float-left mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                            </a>
                                                    
                           

                            <form action="{{ route('klausimai.destroy', $klausimas->id) }}" method="post" class="float-left">
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
            <p> Nera klausimų</p>
    @endif  
    </div>
    <div class="card-footer my-0">
            <div class="row my-0">
                <div class="col-sm-6 my-0">
                {{ $klaus->links() }}
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
                        Viso: {{ $klaus->total() }}
                    </ol>
                </div>
            </div>
        </div>

    
</div>

@endsection