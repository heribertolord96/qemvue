@extends("theme/lte/layout") @section('contenido')
<div class="card card-success">
    <div class="panel panel-default-success">
        <div class="card-header with-border ">
            <h3 class="card-title">Articulos</h3>
        </div>
        @section('search_form')
        <!-- SEARCH FORM -->

        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <select class="form-control form-control-navbar col-md-3" name="criterio">
                    <option value="products.name">Nombre de articulo</option>
                    <option value="products.descripcion">Descripcion</option>
                    <option value="commerces.nombre">Comercios</option>
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
        <!--div class="card-tool pull-right">
            <a href="{?{ route('products.create') }}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Agregar articulo
            </a>
        </div-->
    </div>
    <div class="card-body row-md-12">
        <!--if user.auth=true-->
        @foreach ($products as $product)
        <div class="card card-default col-md-3  float-left">
            <div class="card-header with-border ">
                <div class="card-tools pull-right">
                    <!--here-->
                    <!-- <button type="button" class="btn btn-card-tool" >
                      <a  href="{*{ route('products.show', $product->pid) }}">
                          <i class="fa fa-fw fa-eye 10px"></i>
                      </a>
                        </button>
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{*{ route('products.edit', $product->pid) }}">
                          <i class="fa fa-fw fa-pen 50px"></i>
                      </a>
                    </button>
                    <button type="button" class="btn btn-card-tool" >
                        {*!! Form::open(['route' => ['products.destroy', $product->pid], 'method' => 'DELETE']) !!}
                        <button class="btn-danger">
                            <i class="fa fa-fw fa-trash "></i>
                        </button>                           
                    {*!! Form::close() !!}
                    </button>
                      <button type="button" class="btn btn-card-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-card-tool" data-widget="remove">
                        <i class="fa fa-times"></i></button>
                        -->
                </div>
                <br>
                <h3 class="card-title">{{ $product->pname }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <img style="max-width:300px, max-height:200px" class="d-block w-100" src="{{ $product->pfile }}" height="100" width="100" alt="src-file">
            </div>
            <!-- /.card-body -->
            <div class="card-footer no-padding">
                <tr>
                    <p><b>Descripción: <br>
                        </b> {{ $product->pdescripcion }}</p>
                </tr>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Precio:</b></td>
                            <td>{{ $product->precio_venta }}</td>
                        </tr>
                        <tr>
                            <td><b>Presentacion</b></td>
                            <td>{{ $product->ppresentacion }}</td>
                        </tr>
                        <tr>
                            <td><b>De venta en: </b></td>
                            <td>
                                {{$product->excerpt}}
                                <a href="{{route('commerce_products', $product->slug)}}" class="">
                                      {{ $product->cnombre}}
                                      </a></td>
                        </tr>
                        <!--tr>
                                <td><b>Departamento: </b></td>
                                <td><a href="{*{route('commerce_products', $product->dslug)}}" class="">
                                    {*{ $product->pdepartment}}
                                    </a></td>
                            <td>
                            </td>
                            </tr>
                            <tr>
                                <td><b>Categoria: </b></td>
                               <td><a href="" class="">
                                {*{ $product->pcategory}}
                                </a></td>
                            <td>
                            </td>
                            </tr-->
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