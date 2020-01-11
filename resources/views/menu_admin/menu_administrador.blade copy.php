<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
               <i class="nav-icon fas fa-home"></i>
               <p>
                  Inicio
                  <span class="right badge badge-danger"></span>
               </p>
            </a>
         </li>
       <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
             <i class="nav-icon fas fa-list-alt"></i>
             <p>
                Administrar
                <i class="right fas fa-angle-left"></i>
             </p>
          </a>
          @include('menus.my_commerces')
       </li>
     
    </ul>
 </nav>
 <!-- /.sidebar-menu -->