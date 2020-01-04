@extends("theme/lte/layout")
@section('contenido')
<div class="card card-success">
    <div class="panel panel-default-success">
        <div class="card-header with-border ">
            <h3 class="card-title success">                         
                    Categorias de: 
                    <a href="{{ route('commerces.show', $commerce_d->id) }}" >{{$commerce_d->nombre}}     </a>                    
                    </h3>
        </div>
        <div class="card-tool pull-right">
            <a href="{{ route('categories.create') }}" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Crear categoria
            </a>
        </div>
        @section('titulo')
            Categorias
            @endsection
        </div> 
       
        </div>
        <div class="card-body row-md-12">
            @foreach ($categories as $category)
            <div class="card card-default col-md-6 col-md-offset-2  float-left">                
                <div class="card-header with-border ">  
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('categories.show', $category->id) }}">
                          <i class="fa fa-fw fa-eye 10px"></i>
                      </a>
                        </button>
                        <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('categories.edit', $category->id) }}">
                          <i class="fa fa-fw fa-pen 50px"></i>
                      </a>
                    </button>
                    <button type="button" class="btn btn-card-tool" >
                      <a  href="{{ route('categories.destroy', $category->id) }}">
                          <i class="fa fa-fw fa-trash warning"></i>
                      </a>
                    </button>
                      <button type="button" class="btn btn-card-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-card-tool" data-widget="remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <br>
                        <h3 class="card-title">{{ $category->name }}</h3>   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <img style="max-width:300px, max-height:200px"  class="d-block w-100" src="{{ $category->file }}"    height="100" width="100" alt="src-file">
                </div>
                <!-- /.card-body -->
                <div class="card-footer no-padding">
                    <tr>
                        <p><b>Descripción: <br>
                        </b> {{ $category->body }}</p>
                </tr>
                    <table class="table table-bordered">
                        <tbody>
                                <tr>
                                    <td><b>Inicio:</b></td>
                                        <td>{{ $category->fecha_inicio }}</td>                                        
                                </tr>
                                    <tr><td><b>Fin:</b></td>
                                      <td>{{ $category->fecha_fin }}</td>                                     
                                    </tr>
                                   
                               </tr>
                        </tbody>
                    </table>
                  
                </div>
                <!-- /.footer -->
            </div>
            @endforeach              
             </div> 
             {{ $categories->render() }}
            </div>
<!-- /.card -->
@endsection