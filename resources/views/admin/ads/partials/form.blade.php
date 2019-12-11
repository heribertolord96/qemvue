 

<div class="form-group">
        {{ Form::label('nombre', 'Nombre del anuncio') }}
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
    </div>
    <div class="form-group">
        {{ Form::label('slug', 'URL amigable') }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
    </div>
    <div class="form-group">
            {{ Form::label('descripcion', 'Descripción') }}
            {{ Form::textarea('descripcion', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
                {{ Form::label('fecha_inicio', 'Inicio:') }}                
                {{ Form::date('inicio_vigencia', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                    {{ Form::label('fin_vigencia', 'fin') }}                    
                {{ Form::date('fin_vigencia', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>
    <div class="form-group">
            {{ Form::label('image', 'Imagen') }}
            {{ Form::file('image') }}
        </div>    
     </div>
            </div>
    <div class="form-group panel-footer">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary save' ]) }}
    </div>
    
    @section('scripts')
    <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#nombre, #slug").stringToSlug({
                callback: function(text){
                    $('#slug').val(text);
                }
            });
        });
    </script>
    @endsection