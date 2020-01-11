@extends("theme/lte/layout") 
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
        En: 
<input class="form-control form-control-navbar autocomplete" name="buscaren" type="search" placeholder="En yahualica Jal." aria-label="Search">
<div class="input-group-append">
    <button class="btn btn-navbar" type="submit">
        <i class="fas fa-search"></i>
        <i class="fas fa-map-marked-alt"></i>
    </button>
</div>
    </div>
</form>
@endsection
@section('contenido')

        <div id="app">
            <products> </products>
        </div>
        
    </div>
    {{ $products->render() }}
</div>
<!-- /.card -->
@endsection