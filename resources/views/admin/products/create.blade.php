@extends("theme/lte/layout")

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card card-success">
                    <div class="card-header with-border">
                            <h3 class="card-title">Agregar articulo</h3>
                        </div>
                        <div class="panel-body">
                                {!! Form::open(['route' => 'products.store', 'files' => true]) !!}
                                    
                                @include('admin.products.partials.form')
            
                                {!! Form::close() !!}
                            </div>
                
            </div>
        </div>
    </div>
</div>
@endsection