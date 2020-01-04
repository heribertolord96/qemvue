@extends("theme/lte/layout")
@section('contenido')
<div class="card card-warning">
    <div class="panel panel-default-warning">
        <div class="card-header with-border ">
            <h3 class="card-title">Promociones y ofertas</h3>
        </div>
        <div class="card-tool pull-right">
            <a href="{{ route('promotions.create') }}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Agregar Promocion
            </a>
        </div>
        @section('titulo')
            Promos
            @endsection
        </div> 
        @section('search_form')
            <!-- SEARCH FORM -->

    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <select class="form-control form-control-navbar col-md-3" name="criterio">                
                <option value="promotions.nombre">Nombre</option>
                <option value="promotions.descripcion">Descripcion</option>
                <option value="" >fabricante</option>
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
            @foreach ($promotions as $promotion)
            <div class="card card-default col-md-3  float-left " max-height="100px" height="200" >                
                <div class="card-header with-border ">  
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('promotions.show', $promo->id) }}">
                          <i class="fa fa-fw fa-eye 10px"></i>
                      </a>
                        </button>
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('promotions.edit', $promotion->id) }}">
                          <i class="fa fa-fw fa-pen 50px"></i>
                      </a>
                    </button>
                    <button type="button" class="btn btn-card-tool" >
                        {!! Form::open(['route' => ['promotions.destroy', $promotion->id], 'method' => 'DELETE']) !!}
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
                        <h3 class="card-title">{{ $promotion->nombre }}</h3>   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img style="max-width:300px, max-height:200px"  class="d-block w-100" src="{{ $promotion->file }}"   alt="src-file">
    
                </div>
                <!-- /.card-body -->
                <div class="card-footer no-padding">
                    <tr>
                        <p><b>Descripción: <br>
                        </b> {{ $promotion->descripcion }}</p>
                </tr>
                    <table class="table table-bordered">
                        <tbody>
                                <tr>
                                        <td><b>Fecha de inicio:</b></td>
                                            <td>{{ $promotion->fecha_inicio }}</td>                                        
                                    </tr>
                                    <tr>
                                      <td>
                                          <b>Hora de inicio:</b>
                                      </td>
                                      <td>{{ $promotion->hora_inicio }}</td>
                                    </tr>
                                        <tr><td><b>Fecha de finalizacion:</b></td>
                                          <td>{{ $promotion->fecha_fin }}</td>                                     
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <b>Hora de finalizacion:</b>
                                            </td>
                                            <td>{{ $promotion->hora_fin }}</td>
                                        </tr>
                                       
                                   </tr>
                                   
                                <tr>
                                    <td><b>Disponible en: </b></td>
                                    <td>{{ $promotion->tienda_id }}</td>
                            </tr>
                        </tbody>
                    </table>
                  
                </div>
                <!-- /.footer -->
            </div>
            @endforeach              
             </div> 
             {{ $promotions->render() }}
            </div>
<!-- /.card -->
@endsection