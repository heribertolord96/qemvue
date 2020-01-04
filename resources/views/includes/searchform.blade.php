
<!-- SEARCH FORM -->

<form class="form-inline ml-3">
<div class="input-group input-group-sm border-shadow">
<select class="form-control form-control-navbar col-md-3" name="criterio">  
    <option value="commerces">Comercio</option>      <!--buscar primero por nombre, luego por descripcion-->        
    <option value="departments">Departamentos</option>
    <option value="products">Productos</option>
    <option value="promotions">Promociones</option>
    <option value="events">Eventos</option>
</select>
<input class="form-control form-control-navbar" name="buscar" type="search" placeholder="Search" aria-label="Search">
<!--div class="input-group-append">
    <button class="btn btn-navbar" type="submit">
        <i class="fas fa-search"></i>
    </button>
</div-->
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