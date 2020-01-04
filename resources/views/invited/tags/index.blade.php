@extends("theme/lte/layout")
@section("titulo")
Tag
@endsection



@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="card card-success">
            <div class="card-header with-border">
                <h3 class="card-title">Tags</h3>
                <div class="card-tool pull-right">
                    <a href="{{ route('tags.create') }}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear Nuevo Tag
                    </a>
                </div>
                @section('titulo')
            {{$commerce_d->nombre}}
            @endsection
        </div> 
        @section('search_form')
            <!-- SEARCH FORM -->

    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <select class="form-control form-control-navbar col-md-3" name="criterio">                
                <option value="tags.nombre">Nombre</option>
                <option value="tags.descripcion">Descripcion</option>
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
            <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->nombre }}</td>
                                <td width="10px">
                                    <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>     	

                    {{ $tags->render() }}
                </div>
        </div>
    </div>
</div> 
@endsection