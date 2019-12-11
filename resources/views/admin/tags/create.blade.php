@extends("theme/lte/layout")

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card card-success">
                    <div class="card-header with-border">
                            <h3 class="card-title">Crear etiqueta</h3>
                        </div>

                <div class="panel-body ">
                    {!! Form::open(['route' => 'tags.store']) !!}
                        
                        @include('admin.tags.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--
INSERT INTO `tags` (`id`, `nombre`, `slug`, `created_at`, `updated_at`)
VALUES 
(NULL, 'estructura', 'estructura', NULL, NULL), 
(NULL, 'volumen', 'volumen', NULL, NULL),
(NULL, 'cmd', 'cmd', NULL, NULL),
(NULL, 'sql', 'sql', NULL, NULL),
(NULL, 'terminal', 'terminal', NULL, NULL),
(NULL, 'depuracion', 'depuracion', NULL, NULL);
-->