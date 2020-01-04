
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
       <i class="nav-icon fas fa-tachometer-alt"></i>
       <p>
         Opciones
          <i class="right fas fa-angle-left"></i>
       </p>
    </a>
    <ul class="nav nav-treeview">
       <li class="nav-item">
        <button type="button" class="btn btn-card-tool" >
            <a  href="{{ route('products.show', $product->pid) }}">
                <i class="fa fa-fw fa-eye 10px"></i>
            </a>
              </button>
       </li>
       <li class="nav-item">
        <button type="button" class="btn btn-card-tool" >
            <a  href="{{ route('products.edit', $product->pid) }}">
                <i class="fa fa-fw fa-pen 50px"></i>
            </a>
          </button>
       </li>
       <li class="nav-item">
        <button type="button" class="btn btn-card-tool" >
            {!! Form::open(['route' => ['products.destroy', $product->pid], 'method' => 'DELETE']) !!}
            <button class="btn-danger">
                <i class="fa fa-fw fa-trash "></i>
            </button>                           
        {!! Form::close() !!}
        </button>
       </li>
       <li class="nav-item">
        <button type="button" class="btn btn-card-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
    </li>
    <li class="nav-item">
        <button type="button" class="btn btn-card-tool" data-widget="remove">
            <i class="fa fa-times"></i></button>
    </li>
    <li class="nav-item">
    </li>
    </ul>
 </li>