@extends("theme/lte/layout")

@section('contenido1')
@if(Auth::check())
<template v-if="menu==0">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card card-success">
                    <div class="card-header with-border">
                            <h3 class="card-title">Agregar categoria</h3>
                        </div>
                        <div class="panel-body">
                            <div id="app">
                                <example-component> </example-component>
                                </div>
                        </div>
                    </div>
                 </div>
           </div>
</template>
@else
           
            @endif
    @endif
@endsection