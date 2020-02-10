@extends("theme/lte/layout")
@section('contenido')
<div class="card card-success">
    <div class="panel panel-default-success">
        <div class="card-header with-border ">
            <h3 class="card-title success">
                Departamentos de:
                <a href="{{ route('commerces.show', $commerce_d->id) }}">{{$commerce_d->nombre}} </a>
            </h3>
        </div>
        <div class="card-tool pull-right">
            <a href="{{ route('departments.create') }}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Crear departamento
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
                <option value="departments.name">nombre</option>
                <option value="departments.body">Descripcion</option>
            </select>
            <input class="form-control form-control-navbar" name="buscar" type="search" placeholder="Search"
                aria-label="Search">
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
    @foreach ($departments as $department)
    <div class="card card-default col-md-6 col-md-offset-2  float-left">
        <div class="card-header with-border ">
            <div class="card-tools pull-right">
                <button type="button" class="btn btn-card-tool">
                    <a href="{{ route('departments.show', $department->id) }}">
                        <i class="fa fa-fw fa-eye 10px"></i>
                    </a>
                </button>
                <button type="button" class="btn btn-card-tool">
                    <a href="{{ route('departments.edit', $department->id) }}">
                        <i class="fa fa-fw fa-pen 50px"></i>
                    </a>
                </button>
                <button type="" class="btn btn-card-tool">
                    {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'DELETE']) !!}
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
            <h3 class="card-title">{{ $department->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <img style="max-width:300px, max-height:200px" class="d-block w-100" src="{{ $department->file }}"
                height="100" width="100" alt="src-file">
        </div>
        <!-- /.card-body -->
        <div class="card-footer no-padding">
            <tr>
                <p><b>Descripción: <br>
                    </b> {{ $department->body }}</p>
            </tr>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>Inicio:</b></td>
                        <td>{{ $department->fecha_inicio }}</td>
                    </tr>
                    <tr>
                        <td><b>Fin:</b></td>
                        <td>{{ $department->fecha_fin }}</td>
                    </tr>

                    <tr>
                        <td><b>id:</b></td>
                        <td>{{ $commerce_d->id }}</td>
                    </tr>

                    </tr>

                </tbody>
            </table>

        </div>
        <!-- /.footer -->
    </div>
    @endforeach
</div>
{{ $departments->render() }}
</div>
<!-- /.card -->
@endsection