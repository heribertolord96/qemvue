@extends("theme/lte/layout")

@section('contenido')
<div class="card card-success">    
        <div class="col-md-8 col-md-offset-2">
                <div class="card card-success">
                        <div class="card-header with-border">
                            <h3 class="card-title">Ver etiqueta</h3>
                        </div>
                             <table class="table table-striped table-hover">
                    <tr>
                        <td><strong>Nombre</strong></td>
                        <td> <p> {{ $tag->nombre }}</p></td>
                      
                    </tr>
                    <tr>
                            <td><strong>Slug</strong></td>
                            <td><p>{{ $tag->slug }}</p></td>
                    </tr>
                                </table>
                            
                </div>
            </div>
        </div>
    </div>

@endsection