@extends("theme/lte/layout")

@section('contenido')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar Departamento
                        @section('titulo')
                        editar: 
            {{$department->name}}
            @endsection
                    </div>
    
                    <div class="panel-body">
                        {!! Form::model($department, ['route' => ['departments.update', $department->id], 'method' => 'PUT', 'files' => true]) !!}
                            
                            @include('admin.departments.partials.form')    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection