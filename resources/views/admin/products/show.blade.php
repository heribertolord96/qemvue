@extends("theme/lte/layout")
@section('contenido')
<div class="container">
        <div class="card card-default">                                           
                <div class="card-header success with-border ">
                        <h4  class="card-title bg-warning" >Ver Articulo</h4>
                        @section('titulo')
            {{ $product->name }}
            @endsection
                    <h2 class="card-title success">{{ $product->name }}</h2>
                    <div class="card-tools pull-right">
                            <button type="button" class="btn btn-card-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                  </button>
                    </div>
                </div>              
                    <div class="card-body">
                                <img class="d-block w-100" height="300" width="150 "
                                src="{{ $product->file }}" 
                                  height="100" width="100" alt="src-file">
                        </div>
                    <div class="card-footer">
                            <p><strong>Descripción: <br>
                            </strong> {{ $product->descripcion }}</p>
                            <table class="table table-bordered">
                                    <tbody>
                                            <tr>
                                                <td><b>Presentacion:</b></td>
                                                    <td>{{ $product->presentacion }}</td>                                                    
                                                </tr>
                                                    <tr>
                                                            <td><b>Precio:</b></td>
                                                            <td>{{ $product->precio }}</td>
                                                    </tr>
                                                    <tr>
                                                            <td><b>Category</b></td>
                                                            <td>
                                                                {{$product->excerpt}}
                                                               
                                                                    {{ $product->category->name }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Departamento</b></td>
                                                        <td>
                                                            {{$product->excerpt}}
                                                            <!--a href="{*{route('departamento', $product->departamento->slug)}}" class="">
                                                                {*{ $product->departamento->name }}</a></td-->
                                                </tr>
                                                <!--tr>
                                                        <td><b>De venta en: </b></td>
                                                    <td>
                                                      {*{$product->excerpt}}
                                                      <a href="{*{route('commerce', $product->commerce->slug)}}" class="">
                                                          {*{ $product->commerce->nombre }}</a></td>
                                                </tr>
                                                
                                                </tr-->
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
                        <!--div class="card-body">
                            <p>Etiquetas :</p>
                            @@foreach ($product->tags  as $tag)
                                <a href="{*{ route('tag', $tag->slug) }}" class="href">
                                    {*{$tag->name}}
                                </a>, 
                            @@endforeach.
                        </div-->
                    </div>
                
            
    </div>
@endsection