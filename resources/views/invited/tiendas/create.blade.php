@extends("theme/lte/layout")

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card card-success">
                    <div class="card-header with-border">
                            <h3 class="card-title">Crear tienda</h3>
                        </div>

                <div class="panel-body ">
                    {!! Form::open(['route' => 'commerces.store']) !!}
                        
                        @include('admin.commerces.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
-->