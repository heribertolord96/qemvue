<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use App\Commerce;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\Storage;

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
            $count = $categories::count();
        }
        else
        {            
            $categories =Commerce:: 
            join('departments', 'departments.commerce_id','=','commerces.id')
            ->join('categories', 'categories.department_id','=','departments.id')
            ->where('commerces.id', $commerce)
            ->where($criterio, 'like', '%' . $buscar . '%')->paginate(3);
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
        /*         
        select 
departments.id, departments.name as Departamento, 
commerces.id, commerces.nombre as Tienda,
users.id, users.name as Usuario
FROM
departments
join commerces on commerces.id = departments.commerce_id
JOIN commerce_users
join users on users.id = commerce_users.user_id
         */
        $uid =Auth::id();
        $departments = Department::
        orderBy('departments.id','asc') 
        ->join('commerces','commerces.id','=','departments.commerce_id')        
        ->join('commerce_users','commerce_users.commerce_id','=','commerces.id')
        ->join('users','users.id','=','commerce_users.user_id')
        ->where('users.id','=',$uid)     

        
        ->pluck('departments.name', 'departments.id');//Obtener dropdown de mis tiendas        
        //return view('admin.departments.create',compact('commerce'));
        return view('admin.categories.create' , compact( 'departments')); 
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
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $category->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('categories.edit', $category->slug)->
        with('info', 'Categoría creada con éxito');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::find($slug);

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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $slug)
    {
        
        $category = Category::find($slug);
        $category->fill($request->all())->save();
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $category->fill(['file' => asset($path)])->save();
        }   
        return redirect()->route('categories.edit', $category->id)->with('info', 'Categoría actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::find($slug)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
