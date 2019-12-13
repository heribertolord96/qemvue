<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use App\Commerce;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
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
    $categories =Category::
    join ('departments', 'departments.id','=','categories.department_id')
    ->orderBy('categories.name','asc')->paginate(3);
    return view('admin.categories.index', compact('categories'));
        }
        else{
            $categories =Category::orderBy('name','desc')
            ->where($criterio, 'like', '%'. $buscar . '%')
            ->paginate(3);
    return view('admin.categories.index', compact('categories'));
        }
    }

    public function categories($slug, Request $request) //Muestra los categorys que pertenecen a una misma tienda
    {
        $buscar   = $request->buscar;
        $criterio = $request->criterio;       
        $commerce_d  = Commerce::where('slug', $slug)->first();
        $commerce    = Commerce::where('slug', $slug)->pluck('id')->first();
        if ($buscar == '')        {
            /* $select commerces.nombre as Tienda , categories.name as Category, departments.name as Departamento 
            from commerces join departments on departments.commerce_id = commerces.id 
            join categories on categories.department_id =departments.id
             * 
             */
          

            $categories =Commerce:: 
            join('departments', 'departments.commerce_id','=','commerces.id')
            ->join('categories', 'categories.department_id','=','departments.id')
            ->where('commerces.id', $commerce)
            ->orderBy('categories.name', 'ASC')->paginate(3);
            return view('admin.categories.index', compact('categories', 'commerce_d'));
        }
        else
        {            
            $tienda    = Commerce::where('slug', $slug)->pluck('id')->first();
            $categories = Category::where('commerce_id', $tienda)->orderBy('name', 'ASC')->where($criterio, 'like', '%' . $buscar . '%')->paginate(3);
            return view('admin.tienda_departamentos.index', compact('categorys', 'commerce_d'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.categories.create' , compact('category', 'departments')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('categories.edit', $category->id)->
        with('info', 'Categoría creada con éxito');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::orderBy('name', 'ASC')->pluck('name', 'id');
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        
        $category = Category::find($id);
        $category->fill($request->all())->save();

        return redirect()->route('categories.edit', $category->id)->with('info', 'Categoría actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
