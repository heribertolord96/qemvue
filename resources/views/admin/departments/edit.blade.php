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
            {{$departamento->nombre }}
            @endsection
                    </div>
    
                    <div class="panel-body">
                        {!! Form::model($departamento, ['route' => ['departamentos.update', $departamento->id], 'method' => 'PUT']) !!}
                            
                            @include('admin.departamentos.partials.form')    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection