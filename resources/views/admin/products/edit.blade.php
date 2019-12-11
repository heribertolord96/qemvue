@extends("theme/lte/layout")

@section('contenido')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar Producto
                        @section('titulo')
                        editar: 
            {{$product->nombre }}
            @endsection
                    </div>
    
                    <div class="panel-body">
                        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}
                            
                            @include('admin.products.partials.form')    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection