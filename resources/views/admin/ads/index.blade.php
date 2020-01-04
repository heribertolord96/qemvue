@extends("theme/lte/layout")
@section('contenido')
<div class="card card-alert">
    <div class="panel panel-default-alert">
        <div class="card-header with-border ">
            <h3 class="card-title">Anuncios</h3>
        </div>
        <div class="card-tool pull-right">
            <a href="{{ route('anuncios.create') }}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Crear anuncio
            </a>
        </div>
        @section('titulo')
            Anuncios
            @endsection
        </div> 
      
        </div>
        <div class="card-body row-md-12">
            @foreach ($anuncios as $anuncio)
            <div class="card card-default col-md-6 col-md-offset-2  float-left">                
                <div class="card-header with-border ">  
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('anuncios.show', $anuncio->id) }}">
                          <i class="fa fa-fw fa-eye 10px"></i>
                      </a>
                        </button>
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('anuncios.edit', $anuncio->id) }}">
                          <i class="fa fa-fw fa-pen 50px"></i>
                      </a>
                    </button>
                    <button type="button" class="btn btn-card-tool" >
                        {!! Form::open(['route' => ['anuncios.destroy', $anuncio->id], 'method' => 'DELETE']) !!}
                        <button class="btn-danger">
                            <i class="fa fa-fw fa-trash "></i>
                        </button>                           
                    {!! Form::close() !!}
                    </button>
                      <button type="button" class="btn btn-card-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-card-tool" data-widget="remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <br>
                        <h3 class="card-title">{{ $anuncio->nombre }}</h3>   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img style="max-width:300px, max-height:200px"  class="d-block w-100" src="{{ $commerce->file }}"    height="100" width="100" alt="src-file">
                </div>
                <!-- /.card-body -->
                <div class="card-footer no-padding">
                    <tr>
                        <p><b>Descripción: <br>
                        </b> {{ $anuncio->descripcion }}</p>
                </tr>
                    <table class="table table-bordered">
                        <tbody>
                                <tr>
                                    <td><b>Inicio:</b></td>
                                        <td>{{ $anuncio->inicio_vigencia }}</td>                                        
                                </tr>
                                    <tr><td><b>Fin:</b></td>
                                      <td>{{ $anuncio->fin_vigencia }}</td>                                     
                                    </tr>
                                   
                               </tr>
                        </tbody>
                    </table>
                  
                </div>
                <!-- /.footer -->
            </div>
            @endforeach              
             </div> 
             {{ $anuncios->render() }}
            </div>
<!-- /.card -->
@endsection