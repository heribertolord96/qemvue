@extends("theme/lte/layout") @section('contenido')
<div class="card card-success">
    <div class="panel panel-default-success">
        <div class="card-header with-border ">
            <h3 class="card-title success">                         
                            Productos de: 
                            <a href="{{ route('commerces.show', $commerce_d->id) }}" >{{$commerce_d->nombre}}     

                                <img src="{{$commerce_d->file}}" class="img-circle elevation-2" height="70px" box-shadow="2px" alt="User Image">
                            </h3></a>
        </div>
        <div class="card-header with-border ">
            <h3 class="card-title">Articulos</h3> @section('titulo') {{$commerce_d->nombre}} @endsection
        </div>
        @section('search_form')
        <!-- SEARCH FORM -->

        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <select class="form-control form-control-navbar col-md-3" name="criterio">
                    <option value="products.name">Articulo</option>
                    <option value="products.descripcion">Descripcion</option>
                    <option value="products.presentacion">Marca</option>
                    <option value="products.category.name">Categoria</option>
                    <option value="products.departamento.name">Departamento</option>
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
    <table class="table table-bordered table-striped table-sm">
        <thead>

            <tr>
                <th>Opciones</th>
                <th>Nombre.</th>
                <th>Descripcion</th>
                <th>Presentacion</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                @foreach ($myproducts as $product)
                <tr class="card-body col-md-12" height="auto" >

                    <td class="row-md-1">
                        <button type="button" class="btn btn-card-tool">
                            <a href="{{ route('products.show', $product->id) }}">
                                <i class="fa fa-fw fa-eye 10px"></i>
                            </a>
                        </button> &nbsp;
                        <button type="button" class="btn btn-card-tool">
                            <a href="{{ route('products.edit', $product->id) }}">
                                <i class="fa fa-fw fa-pen 50px"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-card-tool">
                            {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
                            <button class="btn-danger">
                                <i class="fa fa-fw fa-trash "></i>
                            </button>
                            {!! Form::close() !!}
                        </button>

                    </td>

                    <td class="row-md-2">
                        {{ $product->name }}
                    </td>

                    <td class="row-md-4">{{ $product->descripcion }}</td>
                    
                    <td class="row-md-1">{{ $product->presentacion }}</td>
                    <td class="row-md-1">{{ $product->precio_venta }}</td>
                    <td >
                        <img  class="row-md-1" style="max-width:50px, max-height:50px" class="d-block w-100" src="{{ $product->file }}" height="50px" width="50px" alt="src-file">

                    </td>
                </tr>

</div>
</div>
@endforeach
</tbody>
</table>
</div>

</div>
{{ $myproducts->render() }}
</div>
<!-- /.card -->
@endsection