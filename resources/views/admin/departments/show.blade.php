@extends("theme/lte/layout")
@section('contenido')
<div class="container">
        <div class="card card-default">                                           
                <div class="card-header success with-border ">
                        <h4  class="card-title bg-warning" >Ver Departamento</h4>
                    <h2 class="card-title success">{{ $department->nombre }}</h2>
                    @section('titulo')
            {{$department->nombre }}
            @endsection
                    <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                  </button>
                    </div>
                </div>              
                    <div class="card-body">
                                <img class="d-block w-100" height="300" width="150 "
                                src="{{ $department->file }}" 
                                  height="100" width="100" alt="src-file">
                        </div>
                    <div class="card-footer">
                            
                            <table class="table table-bordered">

                                    <tbody>
                                        <tr>
                                                <p><b>Descripción: <br>
                                                </b> {{ $department->descripcion }}</p>
                                        </tr>
                                           
                                            <tr>
                                                <td><b>Inicio:</b></td>
                                                    <td>{{ $department->fecha_inicio }}</td>                                                    
                                                </tr>
                                                    <tr>
                                                            <td><b>Fin:</b></td>
                                                            <td>{{ $department->fecha_fin }}</td>
                                                    </tr>
                                                   
                                                    
                                                </tr>
                                    </tbody>
                                </table>
                    </div>
                

                
                </div>
                <br>
                <br>
                <div class="card card-default">                                      
                        <div class="card-header success with-border ">    
                                <h4  class="card-title bg-success" >Etiquetas</h4>             
                            <div class="card-tools pull-right">
                                    <button type="button" class="btn btn-card-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                          </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Etiquetas :</p>
                        </div>
                    </div>
                
            
    </div>
@endsection