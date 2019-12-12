<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Department;
use App\Commerce;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;

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
    
    public function department($slug, Request $request) //Muestra los departments que pertenecen a una misma tienda
    {
        $buscar   = $request->buscar;
        $criterio = $request->criterio;
        $commerce_d  = Commerce::where('slug', $slug)->first();
        //$departamento_d  = Departamento::where('slug', $slug)->first();
        if ($buscar == '')        {
            
            $commerce    = Commerce::where('slug', $slug)->pluck('id')->first();
            $departments = Department::where('commerce_id', $commerce)->orderBy('name', 'ASC')->paginate(3);
            return view('admin.departments.index', compact('departments', 'commerce_d'));
        }
        else
        {
            
            $tienda    = Commerce::where('slug', $slug)->pluck('id')->first();
            $departments = Department::where('commerce_id', $tienda)->orderBy('name', 'ASC')->where($criterio, 'like', '%' . $buscar . '%')->paginate(3);
            return view('admin.tienda_departamentos.index', compact('departments', 'commerce_d'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create',compact('commerce'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {
        $department = Department::create($request->all());
        return redirect()->route('departments.edit', $department->id)
        ->with('info', 'Department creada con éxito');
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
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentUpdateRequest $request, $id)
    {
        $department = Department::find($id);
        $department->fill($request->all())->save();
        return redirect()->route('departments.edit', 
        $department->id)->with('info', 'Info de department actualizada con éxito');
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
