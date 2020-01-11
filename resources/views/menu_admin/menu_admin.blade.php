
@section('menu_admin')

<nav class="mt-2">
  
   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->

      <li @click="menu=8" class="nav-item">
         <a href="/" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
               Inicio
               <span class="right badge badge-danger"></span>
            </p>
         </a>
      </li>
      
      <my_commerces></my_commerces>
   </ul>
</nav>
<!-- /.sidebar-menu -->    
@endsection
@yield('menu_admin')