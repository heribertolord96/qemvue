@extends("theme/lte/layout")
@section('contenido')
<div class="container">
        <div class="card card-default">                                           
                <div class="card-header success with-border ">
                        <h4  class="card-title bg-warning" >Ver Promocion</h4>
                    <h2 class="card-title success">{{ $promo->nombre }}</h2>
                    <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                  </button>
                    </div>
                </div>              
                    <div class="card-body">
                                <img class="d-block w-100" height="300" width="150 "
                                src="{{ $promo->file }}" 
                                 alt="src-file">
                        </div>
                    <div class="card-footer">
                            <p><strong>Descripción: <br>
                            </strong> {{ $promo->descripcion }}</p>
                            <table class="table table-bordered">
                                    <tbody>
                                            <tr>
                                                    <td><b>Fecha de inicio:</b></td>
                                                        <td>{{ $evento->fecha_inicio }}</td>                                        
                                                </tr>
                                                <tr>
                                                  <td>
                                                      <b>Hora de inicio:</b>
                                                  </td>
                                                  <td>{{ $evento->hora_inicio }}</td>
                                                </tr>
                                                    <tr><td><b>Fecha de finalizacion:</b></td>
                                                      <td>{{ $evento->fecha_fin }}</td>                                     
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>Hora de finalizacion:</b>
                                                        </td>
                                                        <td>{{ $evento->hora_fin }}</td>
                                                    </tr>
                                                   
                                               </tr>
                                               
                                            <tr>
                                                <td><b>Disponible en: </b></td>
                                                <td>{{ $promo->tienda_id }}</td>
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