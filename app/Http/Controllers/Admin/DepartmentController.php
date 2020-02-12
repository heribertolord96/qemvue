<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\Commerce;
use App\CommerceUser;
use App\CommerceRole;
use App\User;
use App\CommerceRoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
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
        $departments =Department::orderBy('nombre','desc')->paginate(3);
        return view('admin.departments.index', compact('departments'));
            }
            else
            {
                $departments =Department::orderBy('nombre','desc')
                ->where($criterio, 'like', '%'. $buscar . '%')
                ->paginate(3);
        return view('admin.departments.index', compact('departments'));
            }
    }
    public function departments(Request $request) //Muestra los departments que pertenecen a una misma tienda
    {
        $commerce_d =$request->commerce_d;
        $commerce    = Commerce::where('commerces.slug', $commerce_d)->pluck('id')->first();
        $departments =Department::select('departments.name','departments.body','departments.id as department_id',
        'departments.commerce_id','departments.slug')
        ->paginate(3);
        return [
            'pagination' => [
                'total'        => $departments->total(),
                'current_page' => $departments->currentPage(),
                'per_page'     => $departments->perPage(),
                'last_page'    => $departments->lastPage(),
                'from'         => $departments->firstItem(),
                'to'           => $departments->lastItem(),
            ],
            'departments' => $departments
        ];
        /*
        $buscar   = $request->buscar;
        $criterio = $request->criterio;
        $commerce_d =$request->commerce_d;
        $commerce    = Commerce::where('commerce_slug', $commerce_d)->pluck('commerce_id')->first();
        //$commerce_d  = Commerce::where('commerce_slug', $slug)->first();
        $departments= Department::select('departments.name','departments.body','departments.commerce_id','commerces.slug')
        ->join('commerces','commerces.id','=','departments.commerce_id')
        ->where('departments.commerce_id','=',$commerce);*/
        return $departments;
       /* 
        return $departments = Department::
        where('commerce_id', $commerce)->get()
        ->orderBy('name', 'ASC')->paginate(3);*/
      
        //$departamento_d  = Departamento::where('commerce_slug', $commerce_slug)->first();
       /* if ($buscar == '')        {            
            $commerce    = Commerce::where('slug', $slug)->pluck('commerce_id')->first();
            $departments = Department::where('commerce_id', $commerce)->orderBy('name', 'ASC')->paginate(3);
            //return view('admin.departments.index', compact('departments', 'commerce_d'));
        }
        else
        {
            
            $tienda    = Commerce::where('slug', $slug)->pluck('id')->first();
            $departments = Department::where('commerce_id', $tienda)->orderBy('name', 'ASC')->where($criterio, 'like', '%' . $buscar . '%')->paginate(3);
            return view('admin.tienda_departamentos.index', compact('departments', 'commerce_d'));
        }*/
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uid =Auth::id();
        $commerces = Commerce::orderBy('commerces.nombre','asc')                
                ->join ('commerce_users','commerce_users.commerce_id','=','commerces.id')
                ->join ('users', 'users.id','=','commerce_users.user_id')
                ->where ('users.id','=', $uid)
        ->pluck('commerces.nombre', 'commerces.id');//Obtener dropdown de mis tiendas        
        return view('admin.departments.create',compact('commerces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storex(DepartmentStoreRequest $request)
    {
        
        $department = Department::create($request->all());
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $department->fill(['file' => asset($path)])->save();
        }
       return redirect()->route('departments.edit', $department->id)
        ->with('info', 'Departamento creado con éxito');
    }
    public function store(Request $request){
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();
            //Insertar valores de  negocio
            $department = new Department();
            $department->commerce_id= $request->commerce_id;
            $department->name= $request->name;
            $department->slug = $request->slug;
            $department->body = $request->body;
            $department->condition = $request->condition;
            $department->save();
            
            if ($request->file('image')) {
                $path = Storage::disk('public')->put('image',  $request->file('image'));
                $department->fill(['file' => asset($path)])->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        return view('admin.departments.show', compact('department'));
       // return view('admin.departments.lista_arts', compact('department'));

           }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $department = Department::find($id);
        $uid =Auth::id();
        $commerces = Commerce::orderBy('commerces.nombre','asc')                
                ->join ('commerce_users','commerce_users.commerce_id','=','commerces.id')
                ->join ('users', 'users.id','=','commerce_users.user_id')
                ->where ('users.id','=', $uid)
        ->pluck('commerces.nombre', 'commerces.id');//Obtener dropdown de mis tiendas 

        
        return view('admin.departments.edit', compact('department','commerces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();
            //$commerce = Commerce::find($id);
            $department = Department::findOrFail($request->id);
            $department->commerce_id= $request->commerce_id;
            $department->name= $request->name;
            $department->slug = $request->slug;
            $department->body = $request->body;
            $department->condition = $request->condition;
            $department->save();
            
            if ($request->file('image')) {
                $path = Storage::disk('public')->put('image',  $request->file('image'));
                $department->fill(['file' => asset($path)])->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
