@extends("theme/lte/layout")
@section('contenido')
<div class="card card-alert">
    <div class="panel panel-default-alert">
        <div class="card-header with-border ">
            <h3 class="card-title">Anuncios</h3>
        </div>
        <div class="card-tool pull-right">
            <a href="{{ route('ads.create') }}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Crear anuncio
            </a>
        </div>
        @section('titulo')
            Anuncios
            @endsection
        </div> 
        @section('search_form')
            <!-- SEARCH FORM -->

    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <select class="form-control form-control-navbar col-md-3" name="criterio">                
                <option value="ads.name">Articulo</option>
                <option value="ads.descripcion">Descripcion</option>
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
            @foreach ($ads as $ad)
            <div class="card card-default col-md-6 col-md-offset-2  float-left">                
                <div class="card-header with-border ">  
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('ads.show', $ad->id) }}">
                          <i class="fa fa-fw fa-eye 10px"></i>
                      </a>
                        </button>
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('ads.edit', $ad->id) }}">
                          <i class="fa fa-fw fa-pen 50px"></i>
                      </a>
                    </button>
                    <button type="button" class="btn btn-card-tool" >
                        {!! Form::open(['route' => ['ads.destroy', $ad->id], 'method' => 'DELETE']) !!}
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
                        <h3 class="card-title">{{ $ad->name }}</h3>   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img style="max-width:300px, max-height:200px"  class="d-block w-100" src="{{ $ad->file }}"   alt="src-file">
                </div>
                <!-- /.card-body -->
                <div class="card-footer no-padding">
                    <tr>
                        <p><b>Descripción: <br>
                        </b> {{ $ad->descripcion }}</p>
                </tr>
                    <table class="table table-bordered">
                        <tbody>
                                <tr>
                                    <td><b>Inicio:</b></td>
                                        <td>{{ $ad->inicio_vigencia }}</td>                                        
                                </tr>
                                    <tr><td><b>Fin:</b></td>
                                      <td>{{ $ad->fin_vigencia }}</td>                                     
                                    </tr>
                                   
                               </tr>
                        </tbody>
                    </table>
                  
                </div>
                <!-- /.footer -->
            </div>
            @endforeach              
             </div> 
             {{ $ads->render() }}
            </div>
<!-- /.card -->
@endsection