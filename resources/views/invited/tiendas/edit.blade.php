@extends("theme/lte/layout")

@section('contenido')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    @section('titulo')
                    editar 
            {{$commerce->nombre}}
            @endsection
                        Editar Tienda
                    </div>
    
                    <div class="panel-body">
                        {!! Form::model($commerce, ['route' => ['commerces.update', $commerce->id], 'method' => 'PUT']) !!}
                            
                            @include('admin.commerces.partials.form')    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection