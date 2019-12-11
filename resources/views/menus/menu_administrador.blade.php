<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
               <i class="nav-icon fas fa-home"></i>
               <p>
                  Inicio
                  <span class="right badge badge-danger">

                      
                  </span>
               </p>
            </a>
         </li>
       <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
                Estadisticas
                <i class="right fas fa-angle-left"></i>
             </p>
          </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{asset ("assets/lte/index.html")}}" class="nav-link">
                   <i class="far fa-store nav-icon"></i>
                   <p>Ventas</p>
                </a>
             </li>
             <li class="nav-item">
                <a href="{{asset ("assets/lte/index2.html")}}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Entradas</p>
                </a>
             </li>
             <li class="nav-item">
                <a href="{{asset ("assets/lte/index3.html")}}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Agotados</p>
                </a>
             </li>
          </ul>
       </li>
       <li class="nav-item">
          <a href="{{ route('commerces.index') }}" class="nav-link">
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
       <li class="nav-item">
        <a href="{{ route('products.index') }}" class="nav-link">
           <i class="nav-icon fas fa-barcode"></i>
           <p>
              Productos
              <span class="right badge badge-danger">968</span>
           </p>
        </a>
     </li>
     <li class="nav-item">
        <a href="{{ route('promotions.index') }}" class="nav-link">
           <i class="nav-icon fas fa-cart-arrow-down"></i>
           <p>
              Promociones
              <span class="right badge badge-danger">968</span>
           </p>
        </a>
     </li>
     <li class="nav-item">
     <a href="{{ route('events.index') }}" class="nav-link">
        <i class="nav-icon fas fa-birthday-cake"></i>
        <p>
           Eventos
           <span class="right badge badge-danger">78</span>
        </p>
     </a>
  </li>
    </ul>
 </nav>
 <!-- /.sidebar-menu -->