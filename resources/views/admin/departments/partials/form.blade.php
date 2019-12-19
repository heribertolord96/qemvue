{{ Form::hidden('user_id', auth()->user()->id) }}
<div class="form-group">
        {{ Form::label('commerce_id', 'Mis negocios') }}
        {{ Form::select('commerce_id', $commerces, null, ['class' => 'form-control', 'id' => 'commerce_id']) }}
    </div> 

<div class="form-group">
        {{ Form::label('nombre', 'Nombre del departamento') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
    </div>
    <div class="form-group">
            {{ Form::label('slug', 'URL amigable') }}
            {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
    </div>
    <div class="form-group">
            {{ Form::label('descripcion', 'Descripción') }}
            {{ Form::textarea('body', null, ['class' => 'form-control','placeholder'
            =>'Descripcion de articulos y categorias en general que pertenecen a este departamento'
            ,'id' => 'body']) }}
        </div>       
    <div class="form-group">
            {{ Form::label('image', 'Imagen') }}
            {{ Form::file('image') }}
        </div>

        <div class="form-group">
            {{ Form::label('condition', 'Activar:') }}
            {{ Form::radio('condition', null, ['class' => 'form-control' ,'id'=>'condition','value'=>'1']) }}
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
            $("#name, #slug").stringToSlug({
                callback: function(text){
                    $('#slug').val(text);
                }
            });
        });
    </script>
    @endsection