@extends("theme/lte/layout")
@section('contenido')
<div class="card card-success">
    <div class="panel panel-default-success">
            <div class="card-header success with-border ">
                    <h2 class="card-title success">Articulos de la tienda: {{$commerce_d->nombre}} </h2>
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
        @section('searchform')
            <!-- SEARCH FORM -->

    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <select class="form-control form-control-navbar col-md-3" name="criterio">                
                <option value="products.nombre">Articulo</option>
                <option value="products.descripcion">Descripcion</option>
                <option value="products.presentacion" >Marca</option>
                <option value="products.categoria.nombre" >Categoria</option>
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
                    <div id="carouselExampleIndicators{{$product->id}}" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators{{$product->id}}" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators{{$product->id}}" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators{{$product->id}}" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" max-width="300" max-height="200">
                          <div class="carousel-item active">
                            <img max-width="300" max-height="200"  class="d-block w-100" src="{{ $product->file }}"   alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img max-width="300" max-height="200"  class="d-block w-100" src="/images/critor.png"    alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img max-width="300" max-height="200"  class="d-block w-100" src="/images/A29.jpg"   alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators{{$product->id}}" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators{{$product->id}}" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    <!-- /.col -->
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
                                  <a href="{{route('tienda', $product->tienda->id)}}" class="">
                                      {{ $product->tienda->nombre }}
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