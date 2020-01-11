<nav class="mt-2">
   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview menu-open">
         <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
               Explorar
               <i class="right fas fa-angle-left"></i>
            </p>
         </a>
         <ul class="nav nav-treeview">
            <li @click="menu=0" class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-store-alt"></i>
                  <p>
                     Tiendas
                     <span class="right badge badge-danger">60</span>
                     <!--Un usuario puede ver informacion (estadisticas) de 
                  otras tiendas de su compania,
              pero solo puede administrar datos de su tienda -->
                  </p>
               </a>
            </li>
            <li @click="menu=1" class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-barcode"></i>
                  <p>
                     Productos
                     <span class="right badge badge-danger">968</span>
                  </p>
               </a>
            </li>
            <li @click="menu=2" class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-arrow-down"></i>
                  <p>
                     Promociones
                     <span class="right badge badge-danger">968</span>
                  </p>
               </a>
            </li>
            <li @click="menu=3" class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-birthday-cake"></i>
                  <p>
                     Eventos
                     <span class="right badge badge-danger">78</span>
                  </p>
               </a>
            </li>

         </ul>
         <li @click="menu=11" class="nav-item">
            <a href="#" class="nav-link">
               <i class="nav-icon fas fa-flag"></i>
               <p>
                 Explorar estilos
                  <span class="right badge badge-danger">Testing css...</span>
               </p>
            </a>
         </li>
      </li>
   </ul>
   </li>

</nav>