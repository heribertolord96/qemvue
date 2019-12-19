    <div class="form-group">
            {{ Form::label('department_id', 'Seleccione un departamento') }}
            {{ Form::select('department_id', $departments, null, ['class' => 'form-control','id'=>'department_id']) }}
        </div> 

<div class="form-group">
        {{ Form::label('name', 'Nombre de categoria:') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder'=>'Desarmadoresy llaves']) }}
    </div>
    <div class="form-group">
        {{ Form::label('slug', 'URL amigable') }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
    </div>
    <div class="form-group">
            {{ Form::label('body', 'Descripción') }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
                {{ Form::label('condition', 'Desactivar:') }}
                {{ Form::radio('condition', null, ['class' => 'form-control' ,'id'=>'condition','value'=>'0']) }}

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