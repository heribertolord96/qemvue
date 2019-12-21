@extends("theme/lte/layout")
@section('contenido')
<div class="card card-success">
    <div class="panel panel-default-success">
        <div class="card-header with-border ">
            <h3 class="card-title">Articulos</h3>
        </div>
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
                      <a  href="{{ route('prod_list.show', $product->id) }}">
                          <i class="fa fa-fw fa-eye 10px"></i>
                      </a>
                        </button>
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('prod_list.edit', $product->id) }}">
                          <i class="fa fa-fw fa-pen 50px"></i>
                      </a>
                    </button>
                    <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('prod_list.destroy', $product->id) }}">
                          <i class="fa fa-fw fa-trash warning"></i>
                      </a>
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
                                    <td>{{ $product->commerce_id }}</td>
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