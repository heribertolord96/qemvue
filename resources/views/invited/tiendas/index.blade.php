@extends("theme/lte/layout")

@section('contenido')
<!----------------------------------------------------------------->
<div class="card card-success">
            <div class="panel panel-default-success">
                <div class="card-header with-border ">
                    <h3 class="card-title">Tiendas</h3>
                </div>
                <div class="card-tool pull-right">
                    <a href="{{ route('commerces.create') }}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Agregar tienda
                    </a>
                </div>
                </div>
                <div class="card-body">
                     @foreach ($commerces as $commerce)
    <div class="card card-default">
        <div class="card-header with-border">
          <h3 class="card-title">{{ $commerce->nombre }}</h3>    
          
          <div class="card-tools pull-right">
              <button type="button" class="btn btn-card-tool" >
            <a  href="{{ route('commerces.show', $commerce->id) }}">
                <i class="fa fa-fw fa-eye"></i>
            </a>
              </button>
              <button type="button" class="btn btn-card-tool" >
            <a  href="{{ route('commerces.edit', $commerce->id) }}">
                <i class="fa fa-fw fa-pen"></i>
            </a>
          </button>
          <button type="button" class="btn btn-card-tool" >
              {!! Form::open(['route' => ['commerces.destroy', $commerce->id], 'method' => 'DELETE']) !!}
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
          @section('search_form')
            <!-- SEARCH FORM -->

    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <select class="form-control form-control-navbar col-md-3" name="criterio">                
                <option value="commerces.nombre">Tienda</option>
                <option value="commerces.descripcion">Descripcion</option>
                <option value="">Ubicacion</option>
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
        <!-- /.card-header -->
        <div class="card-body"  >
          <!--style
            max-width:300px
            max-height="200"-->
            </style-->
            <img style="max-width:300px, max-height:200px"  class="d-block w-100" src="{{ $commerce->file }}"   alt="src-file">
    
        </div>
        <!-- /.card-body -->
        <div class="card-footer no-padding">
            <tr>
                <p><b>Descripción: <br>
                </b> {{ $commerce->descripcion }}</p>
        </tr>
            <table class="table table-bordered">
                <tbody>
                        <tr>
                            <td><b>Abrimos a:</b></td>
                                <td>{{ $commerce->hora_apertura }}</td>
                                
                            </tr>
                                <tr>
                                        <td><b>Cerramos a:</b></td>
                                        <td>{{ $commerce->hora_cierre }}</td>
                                </tr>
                                
                            </tr>
                </tbody>
            </table>
          
        </div>
        <!-- /.footer -->
    </div>
    @endforeach     
      
     {{ $commerces->render() }}
    
      <!-- /.card -->
@endsection

