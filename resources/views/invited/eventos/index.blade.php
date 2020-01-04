@extends("theme/lte/layout")
@section('contenido')
<div class="card card-success">
    <div class="panel panel-default-success">
        <div class="card-header with-border ">
            <h3 class="card-title">Eventos</h3>
        </div>
        <div class="card-tool pull-right">
            <a href="{{ route('events.create') }}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Crear evento
            </a>
        </div>
        @section('titulo')
            Eventos
            @endsection
        @section('search_form')
            <!-- SEARCH FORM -->

    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <select class="form-control form-control-navbar col-md-3" name="criterio">                
                <option value="events.nombre">Nombre</option>
                <option value="events.descripcion">Descripcion</option>
            </select>
            <input class="form-control form-control-navbar" name="buscar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
          @endsection
        </div>
        <div class="card-body row-md-12">
            @foreach ($events as $event)
            <div class="card card-default col-md-6 col-md-offset-2  float-left">                
                <div class="card-header with-border ">  
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('events.show', $event->id) }}">
                          <i class="fa fa-fw fa-eye 10px"></i>
                      </a>
                        </button>
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('events.edit', $event->id) }}">
                          <i class="fa fa-fw fa-pen 50px"></i>
                      </a>
                    </button>
                    <button type="button" class="btn btn-card-tool" >
                        {!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'DELETE']) !!}
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
                        <h3 class="card-title">{{ $event->nombre }}</h3>   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img style="max-width:300px, max-height:200px"  class="d-block w-100" src="{{ $event->file }}"   alt="src-file">
    
                </div>
                <!-- /.card-body -->
                <div class="card-footer no-padding">
                    <tr>
                        <p><b>Descripción: <br>
                        </b> {{ $event->descripcion }}</p>
                </tr>
                    <table class="table table-bordered">
                        <tbody>
                                <tr>
                                    <td><b>Fecha de inicio:</b></td>
                                        <td>{{ $event->fecha_inicio }}</td>                                        
                                </tr>
                                <tr>
                                  <td>
                                      <b>Hora de inicio:</b>
                                  </td>
                                  <td>{{ $event->hora_inicio }}</td>
                                </tr>
                                    <tr><td><b>Fecha de finalizacion:</b></td>
                                      <td>{{ $event->fecha_fin }}</td>                                     
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Hora de finalizacion:</b>
                                        </td>
                                        <td>{{ $event->hora_fin }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td><b>Disponible en: </b></td>
                                        <td>{{ $event->commerce_id }}</td>
                                </tr>
                        </tbody>
                    </table>
                  
                </div>
                <!-- /.footer -->
            </div>
            @endforeach              
             </div> 
             {{ $events->render() }}
            </div>
<!-- /.card -->
@endsection