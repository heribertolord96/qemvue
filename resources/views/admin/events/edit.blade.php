@extends("theme/lte/layout")

@section('contenido')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar Evento
                        @section('titulo')
                        editar: 
            {{$event->name }}<!--Nombre del evento-->
            @endsection
                    </div>
    
                    <div class="panel-body">
                        {!! Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'PUT']) !!}
                            
                            @include('admin.events.partials.form')    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection