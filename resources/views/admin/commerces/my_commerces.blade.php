@extends("theme/lte/layout")

@section('contenido')
<!----------------------------------------------------------------->
<div class="card card-success">
            <div class="panel panel-default-success">
                <div class="card-header with-border ">
                    <h3 class="card-title">Commerces</h3>
                </div>
                @guest
                @else
                <div class="card-tool pull-right">
                  <a href="{{ route('commerces.create') }}" class="btn btn-block btn-info btn-sm">
                      <i class="fa fa-fw fa-plus-circle"></i> Agregar commerce
                  </a>
              </div>
                @endguest
                
                </div>
                <div class="card-body">
                     @foreach ($commerces as $commerce)
    <div class="card card-default">
        <div class="card-header with-border">
          <h3 class="card-title">{{ $commerce->nombre }}</h3>    
                    <div class="card-tools pull-right">
              <button type="button" class="btn btn-card-tool" >
            <a  href="{{ route('commerces.show', $commerce->commerce_id) }}">
                <i class="fa fa-fw fa-eye"></i>
            </a>
              </button>
              <button type="button" class="btn btn-card-tool" >
            <a  href="{{ route('commerces.edit', $commerce->commerce_id)}}">
                <i class="fa fa-fw fa-pen"></i>
            </a>
          </button>
          <button type="button" class="btn btn-card-tool" >
              {!! Form::open(['route' => ['commerces.destroy', $commerce->commerce_id], 'method' => 'DELETE']) !!}
              <button class="btn-danger">
                  <i class="fa fa-fw fa-trash "></i>
              </button>                           
          {!! Form::close() !!}
          </button>
            <button type="button" class="btn btn-card-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-card-tool" data-widget="remove">
              <i class="fa fa-times"></i></button>
          </div>
         <!----------------------------------------------------------------->
         @section('my_menu')   
<style>
        ul, #myUL {
          list-style-type: none;
        }
        
        #myUL {
          margin: 0;
          padding: 0;
        }
        
        .caret {
          cursor: pointer;
          -webkit-user-select: none; /* Safari 3.1+ */
          -moz-user-select: none; /* Firefox 2+ */
          -ms-user-select: none; /* IE 10+ */
          user-select: none;
        }
        
        .caret::before {
          content: "\25B6";
          color: black;
          display: inline-block;
          margin-right: 6px;
        }
        
        .caret-down::before {
          -ms-transform: rotate(90deg); /* IE 9 */
          -webkit-transform: rotate(90deg); /* Safari */'
          transform: rotate(90deg);  
        }
        
        .nested {
          display: none;
        }
        
        .active {
          display: block;
        }
  </style>
  <div class="input-group input-group-sm">
    
  <ul id="myUL">
    <li>Administrar
      <span class="caret success">1</span>
      <ul class="nested">
    <li>Commerces
      <span class="caret success">1</span>
      <ul class="nested">
        <li><span class="caret">Departments</span>
        </li>  
      
        <li><span class="caret">Categories</span>
        </li>  
        <li><span class="caret">Products</span>
        </li>  
    </li>
  </ul>
    </li>
  </ul>
  
  <script>
  var toggler = document.getElementsByClassName("caret");
  var i;
  
  for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function() {
      this.parentElement.querySelector(".nested").classList.toggle("active");
      this.classList.toggle("caret-down");
    });
  }
  </script>
  </div>
 
      @endsection
         <!----------------------------------------------------------------->
          @section('search_form')
            <!-- SEARCH FORM -->

    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <select class="form-control form-control-navbar col-md-3" name="criterio">                
                <option value="commerces.nombre">Commerce</option>
                <option value="commerces.descripcion">Descripcion</option>
                <option value="">Ubicacion</option>
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
        </div>
    </form>
          @endsection
        </div>
        <!-- /.card-header -->
        <div class="card-body"  >
          <!--style
            max-width:300px
            max-height="200"-->
            </style-->
            <img   class="d-block w-100" src="{{ $commerce->file }}"  height="100" width="100"  height="100" width="100" alt="src-file">
          <!--div  id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" style="max-width:300px; max-height:200px; float:center;">
                  <div class="carousel-item active">
                    <img style="max-width:300px, max-height:200px"  class="d-block w-100" src="{*{ $commerce->file }}"    height="100" width="100" alt="src-file">
                  </div>
                  <div class="carousel-item">
                    <img style=" max-width:300px, max-height:200px"  class="d-block w-100" src="/images/critor.png"    alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img style=" max-width:300px, max-height:200px"  class="d-block w-100" src="/images/A29.jpg"   alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div-->
            <!-- /.col -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer no-padding">
            <tr>
                <p><b>Descripción: <br>
                </b> {{ $commerce->descripcion }}</p>
        </tr>
            <table class="table table-bordered">
                <tbody>
                        <tr>
                            <td><b>Abrimos a:</b></td>
                                <td>{{ $commerce->hora_apertura }}</td>
                                
                            </tr>
                                <tr>
                                        <td><b>Cerramos a:</b></td>
                                        <td>{{ $commerce->hora_cierre }}</td>
                                </tr>
                                
                            </tr>
                </tbody>
            </table>
          
        </div>
        <!-- /.footer -->
    </div>
    @endforeach     
      
     {{ $commerces->render() }}
    
      <!-- /.card -->
@endsection

