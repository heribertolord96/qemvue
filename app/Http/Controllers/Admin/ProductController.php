<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Product;
Use App\Category;
Use App\Commerce;
Use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

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
        $buscar = $request->buscar;
            $criterio = $request->criterio;
            if ($buscar==''){
        $products =Product::orderBy('name','ASC')
        ->paginate(20);
        return view('admin.products.index', compact('products'));
            }
            else
            {
                $products =Product::orderBy('name','ASC')
                ->where($criterio, 'like', '%'. $buscar . '%')
        ->paginate(20);
        return view('admin.products.index', compact('products'));
            }
    }   
   /* public function listar_prod($id)
        {
            $commerce = Commerce::find($id);
            $products =Product::orderBy('name','ASC')->paginate(2);
            return view('admin.commerces.lista_arts', compact('products'));

        }*/

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
        $tags       = Tag::orderBy('name', 'ASC')->get();
        return view('admin.products.create', compact('commerces', 'tags','categorias','departamentos'));
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
        return view('admin.products.show', compact('products'));
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
