@extends("theme/lte/layout")
@section('contenido')
<div class="card card-success">
    <div class="panel panel-default-success">
            <div class="card-header success with-border ">
                    <h2 class="card-title success">Articulos de la commerce: {{$commerce_d->nombre}} </h2>
                    <!--
                      Agregar tambien: fondo y colores cargados desde la db
                    -->
                    <div class="card-tools pull-right">
                       <button type="button" class="btn btn-card-tool" data-widget="collapse">
                       <i class="fa fa-minus"></i>
                       </button>
                    </div>
                 </div>
        <div class="card-header with-border ">
            <h3 class="card-title">Articulos</h3>
            @section('titulo')
            {{$commerce_d->nombre}}
            @endsection
        </div> 
        @section('search_form')
            <!-- SEARCH FORM -->

    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <select class="form-control form-control-navbar col-md-3" name="criterio">                
                <option value="products.nombre">Articulo</option>
                <option value="products.descripcion">Descripcion</option>
                <option value="products.presentacion" >Marca</option>
                <option value="products.category.nombre" >Category</option>
                <option value="products.departamento.nombre" >Departamento</option>
                <option value="" >fabricante</option>
            </select>
            <input class="form-control form-control-navbar" name="buscar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
          @endsection
        <div class="card-tool pull-right">
            <a href="{{ route('products.create') }}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Agregar articulo
            </a>
        </div>
        </div>
        <div class="card-body row-md-12">
            @foreach ($products as $product)
            <div class="card card-default col-md-3  float-left">                
                <div class="card-header with-border ">  
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('products.show', $product->id) }}">
                          <i class="fa fa-fw fa-eye 10px"></i>
                      </a>
                        </button>
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('products.edit', $product->id) }}">
                          <i class="fa fa-fw fa-pen 50px"></i>
                      </a>
                    </button>
                    <button type="button" class="btn btn-card-tool" >
                        {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
                        <button class="btn-danger">
                            <i class="fa fa-fw fa-trash "></i>
                        </button>                           
                    {!! Form::close() !!}
                    </button>
                      <button type="button" class="btn btn-card-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-card-tool" data-widget="remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <br>
                        <h3 class="card-title">{{ $product->nombre }}</h3>   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <img style="max-width:300px, max-height:200px"  class="d-block w-100" src="{{ $product->file }}"    height="100" width="100" alt="src-file">
                </div>
                <!-- /.card-body -->
                <div class="card-footer no-padding">
                    <tr>
                        <p><b>Descripción: <br>
                        </b> {{ $product->descripcion }}</p>
                </tr>
                    <table class="table table-bordered">
                        <tbody>
                                <tr>
                                    <td><b>Precio:</b></td>
                                        <td>{{ $product->precio }}</td>                                        
                                </tr>
                                    <tr><td><b>Descripcion</b></td>
                                      <td>{{ $product->descripcion }}</td>                                     
                                    </tr>
                                    <tr>
                                        <td><b>Presentacion</b></td>
                                        <td>{{ $product->presentacion }}</td>
                                </tr>
                                <tr>
                                    <td><b>De venta en: </b></td>
                                <td>
                                  {{$product->excerpt}}
                                  <a href="{{route('commerce', $product->commerce->id)}}" class="">
                                      {{ $product->commerce->nombre }}
                                      </a></td>
                            </tr>
                               </tr>
                        </tbody>
                    </table>
                  
                </div>
                <!-- /.footer -->
            </div>
            @endforeach              
             </div> 
             {{ $products->render() }}
            </div>
<!-- /.card -->
@endsection