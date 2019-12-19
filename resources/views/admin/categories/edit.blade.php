@extends("theme/lte/layout")

@section('contenido')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar Category
                        @section('titulo')
                        editar: 
            {{$category->name}}
            @endsection
                    </div>
    
                    <div class="panel-body">
                        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT', 'files' => true]) !!}
                            
                            @include('admin.categories.partials.form')    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection