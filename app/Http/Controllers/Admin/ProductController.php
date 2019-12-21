<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Product;
Use App\Category;
Use App\Commerce;
Use App\Department;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        /*
        select products.name As Producto,departments.name as Departamento, 
        categories.name  As Categoria,
        commerces.nombre as De_Venta_en
            FROM 
            products
            join categories on categories.id = products.category_id
            JOIN departments on categories.department_id = departments.id
            join commerces on departments.commerce_id = commerces.id
         */
        $buscar = $request->buscar;
            $criterio = $request->criterio;
            if ($buscar==''){
                $products=Product::orderBy('pname','ASC')       
                ->select('products.id as pid','products.name as pname','products.slug as pslug',
                'products.codigo as pcode','products.descripcion as pdescripcion',
                'products.stock as pstock','products.file as pfile',
                'products.presentacion as ppresentacion','products.precio_venta as precio_venta',
                'products.condition as pcondition',
                'commerces.nombre as cnombre', 'commerces.slug as slug',
                'departments.name as pdepartment','departments.slug as dslug',
                'categories.name as pcategory')         
            ->join ('categories','categories.id','=','products.category_id')
            ->join ('departments','categories.department_id','=','departments.id')
            ->join('commerces','departments.commerce_id','=', 'commerces.id')
            ->paginate(20);

       /* $products =Product::orderBy('name','ASC')*/
        
        return view('admin.products.index', compact('products'));
            }
            else
            {
                $products=Product::orderBy('pname','ASC')       
                ->select('products.id as pid','products.name as pname','products.slug as pslug',
                'products.codigo as pcode','products.descripcion as pdescripcion',
                'products.stock as pstock','products.file as pfile',
                'products.presentacion as ppresentacion','products.precio_venta as precio_venta',
                'products.condition as pcondition',
                'commerces.nombre as cnombre', 'commerces.slug as slug',
                'departments.name as pdepartment','departments.slug as dslug',
                'categories.name as pcategory')         
            ->join ('categories','categories.id','=','products.category_id')
            ->join ('departments','categories.department_id','=','departments.id')
            ->join('commerces','departments.commerce_id','=', 'commerces.id')
                ->where($criterio, 'like', '%'. $buscar . '%')
        ->paginate(20);
        return view('admin.products.index', compact('products'));
            }
    }  

   public function products($slug, Request $request)
    {
        $buscar = $request->buscar;
            $criterio = $request->criterio;
            if ($buscar==''){
                $commerce_d  = Commerce::where('slug', $slug)->first();
                $commerce    = Commerce::where('slug', $slug)->pluck('id')->first();
        /**
         * select commerces.nombre as Tienda , categories.name as Category, 
         * departments.name as Departamento, products.name as Producto 
         * from products 
         * join categories ON categories.id = products.category_id 
         * join departments on departments.id = categories.department_id 
         * join commerces on commerces.id = departments.commerce_id
         */
                $products = Commerce::
                join('departments', 'departments.commerce_id','=','commerces.id')
                ->join('categories', 'categories.department_id','=','departments.id')
                ->join('products', 'products.category_id','=','categories.id')
                ->where('departments.commerce_id', $commerce)                
                ->orderBy('products.name', 'ASC')->paginate(3);
                return view('admin.products.myproducts', compact('products', 'commerce_d'));
            }
            else
            {
                $products =Product::orderBy('name','ASC')
                ->where($criterio, 'like', '%'. $buscar . '%')
        ->paginate(20);
        return view('admin.products.index', compact('products'));
            }
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commerces = Commerce::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $departments = Department::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('nombre', 'ASC')->get();
        return view('admin.products.create', compact('commerces', 'tags','categories','departaments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->all());
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $product->fill(['file' => asset($path)])->save();
        }
        return redirect()->route('products.edit', $product->id)
        ->with('info', 'Product agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commerces = Commerce::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $departments = Department::orderBy('name', 'ASC')->pluck('name', 'id');

        $product = Product::find($id);
        return view('admin.products.edit', 
        compact('product', 'commerces','categories','departments', 'tags'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all())->save();
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $product->fill(['file' => asset($path)])->save();
        }   
        return redirect()->route('products.edit', 
        $product->id)->with('info', 'Info de product actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
