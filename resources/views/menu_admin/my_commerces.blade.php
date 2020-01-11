@guest

    @else
<ul class="nav nav-treeview">

  <li  class="nav-item has-treeview">
     <a href="#" class="nav-link">
        <i class="nav-icon fas fa-list-alt"></i>
       
      </li>
        
     <ul class="nav nav-treeview"> 
        <li class="nav-item">
         ete
         </li>                 
      
        <li   class="nav-item">
            <a href="{{ route('commerces.index') }}" class="nav-link">
               <i class="nav-icon fas fa-bag-alt"></i>
               <p>
                  Eliminar
                  <span class="right badge badge-danger">60</span>
                  <!--Un usuario puede ver informacion (estadisticas) de 
                      otras tiendas de su compania,
                  pero solo puede administrar datos de su tienda -->
               </p>
            </a>
         </li>
         <li  class="nav-item">
            <a href="{{ route('events.index') }}" class="nav-link">
               <i class="nav-icon fas fa-birthday-cake"></i>
               <p>
                  Proveedores
                  <span class="right badge badge-danger">78</span>
               </p>
            </a>
         </li>
         <li class="nav-item">
          <a href="{{ route('promotions.index') }}" class="nav-link">
             <i class="nav-icon fas fa-cart-arrow-down"></i>
             <p>
                Pedidos
                <span class="right badge badge-danger">968</span>
             </p>
          </a>
       </li>
     </ul>
    
@endguest