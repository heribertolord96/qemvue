@extends("admin.commerces.show")
@section('tabs')   
      <!-- Custom Tabs -->
      <div class="card">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">Tabs</h3>
          <ul class="nav nav-pills ml-auto p-2">
             
            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Productos
                
            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Servicios</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Promociones</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Eventos</a></li>
            <div class="card-tools pull-right">
                <button type="button" class="btn btn-card-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
        </div>
            
          </ul>
          
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
           a@include('admin.commerces.lista_arts');
            
            <!-- /.tab-pane -->
            @include("admin.commerces.partials.tienda_tabs.promociones");
            
            <!-- /.tab-pane -->
            @include("admin.commerces.partials.tienda_tabs.events");
            
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- ./card -->
    
 
      @endsection