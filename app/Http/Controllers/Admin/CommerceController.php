<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Commerce;
use App\CommerceUser;
use App\CommerceRole;
use App\Role;
use App\Location;
use App\User;
use App\CommerceRoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Requests\CommerceStoreRequest;
use App\Http\Requests\CommerceUpdateRequest;

class CommerceController extends Controller
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
    public function indexx(Request $request){
        $commerces=Commerce::all();
        return $commerces;
    }

    public function index(Request $request)
    {
        $buscar = $request->buscar;
            $criterio = $request->criterio;
            if ($buscar==''){
        $commerces =Commerce::all()
        //->select('commerces.id','commerces.nombre','commerces.descripcion','commerces.slug')
        ;
return $commerces;
        //return view('admin.commerces.index', compact('commerces'));
            }
            else{
                $commerces =Commerce::orderBy('nombre','asc')
                ->where($criterio, 'like', '%'. $buscar . '%')
                ->paginate(3);
               // return $commerces;
        //return view('admin.commerces.index', compact('commerces'));
            }
    }   
   
    public function my_commerces(Request $request)
    {
        $user = Auth::user()->id;
        $buscar = $request->buscar;
            $criterio = $request->criterio;
            if ($buscar==''){
        /*$commerces =CommerceUser::orderBy('commerces.nombre','asc')
        ->join ( 'commerces', 'commerce_users.commerce_id' ,'=' ,'commerces.id')
                ->join('users', 'commerce_users.user_id','=','users.id')
                */
                $commerces =CommerceUser::orderBy('commerces.nombre','asc')
                ->join ( 'commerces', 'commerce_users.commerce_id' ,'=' ,'commerces.id')
                ->join('users', 'commerce_users.user_id','=','users.id')
                ->join('locations','commerces.ubicacion_id','=','locations.id')
                ->join('commerce_roles','commerces.id','=','commerce_roles.commerce_id')
                ->join('roles','commerce_roles.role_id','=','roles.id')                
                ->where ('users.id','=', $user)
                ->select(
                    'users.id as user_id',
                    'commerces.id as commerce_id',
                    'commerces.nombre' ,
                    'commerces.slug as commerce_slug',
                    'commerces.descripcion',  
                    'commerces.hora_apertura',
                    'commerces.hora_cierre',
                    'commerces.num_telefono',
                    'commerces.email',
                    'commerces.file',
                    'commerces.condition',
                    'locations.id as ubicacion_id',
                    'locations.calle',
                    'locations.numero_interior',
                    'locations.numero_exterior',
                    'locations.city',
                    'locations.state',
                    'locations.country',
                    'locations.longitude',
                    'locations.latitude',                   
                    'roles.id as role_id',                    
                    'roles.name as role_name',
                    'roles.slug as role_slug',
                    'roles.description',
                    'roles.special'
                    )
        ->get()  ; 
        
        return $commerces;
            }

            else{
                $commerces =CommerceUser::orderBy('commerces.nombre','asc')
                ->join ( 'commerces', 'commerce_users.commerce_id' ,'=' ,'commerces.id')
                ->join('users', 'commerce_users.user_id','=','users.id')
                ->where ('users.id','=', '2')
                ->where($criterio, 'like', '%'. $buscar . '%')
                ->paginate(3);
        return view('admin.commerces.my_commerces', compact('my_commerces','commerces'));
            }
    }
    /*public function show_my_commerce()
    {
        $commerce = Commerce::find('commerces.id');
        return view('admin.commerces.show', compact('commerce'));
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $roles = 1; //==owner
        /*$commercerole = CommerceRole::where ('role_id','1')
        ->where ('commerce_id','981') ->pluck('id');/*/
        //$commerceroleuser = CommerceRoleuser::where ('commerce_user_id','user_id')->pluck('id');
        $uid =Auth::id();
        return view('admin.commerces.create',  compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storex(CommerceStoreRequest $request)
    {
        
        //Insertar valores de  negocio
         $commerce = Commerce::create($request->all()); 
        
        //Relacion usuario-negocio
        $commerceuser = CommerceUser::create([
            'id' => request('commerceuserid'),
            'commerce_id' => request('id'),//commerce->id
            'user_id' => request('user_id')
        ]);
        $commercerole = CommerceRole::create([
            'id' => request('commerceroleid'),
            'commerce_id' => request('id'),//commerce->id
            'role_id' => request('role_id')//owner in role table
        ]);
        $commerceroleuser = CommerceRoleUser::create([
            'commerce_user_id' => request('commerceuserid'),//commerce->id
            'commerce_role_id' => request('commerceroleid') //in commerce_role table
            /*
            Se crea una relacion que indica que un comercio puede tener un grupo 
            de usuarios con disintos roles
             */
        ]);   
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $commerce->fill(['file' => asset($path)])->save();
        }     
        //$commerce = Commerce::get();
        return redirect()->route('commerces.edit', $commerce->id)
        ->with('info', 'commerce agregado con éxito');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show  commerces from commerces.index
            public function show($slug)
            {       
                $commerce = Commerce::find($slug);
                /*$commerce= Commerce::
                    select('commerces.nombre as nombre')
                    ->join('commerce_users','commerce_users.commerce_id','=','commerces.id')
                        ->join('departments', 'departments.commerce_id','=','commerces.id')
                        ->join('categories', 'categories.department_id','=','departments.id')
                        ->join('products', 'products.category_id','=','categories.id')
                        ->get('nombre') ;*/
                return view('admin.commerces.show', compact('commerce'));
            }
        //show  commerces from commerces.my_commerces
            public function getcommerce($commerce_id)//Para acceder a los detalles de un item desde el  listado
            {
                /*$cmmerce_d  = Commerce::where('nombre', $nombre)->first();
                        $commerce_id    = Commerce::where('nombre', $nombre)->pluck('id')->first();*/

                $commerce = Commerce::
                join('commerce_users','commerce_users.commerce_id','=','commerce_id')
                        ->join('departments', 'departments.commerce_id','=','commerces.id')
                        ->join('categories', 'categories.department_id','=','departments.id')
                        ->join('products', 'products.category_id','=','categories.id')
                        ->where('departments.commerce_id', $commerce_id)
                        
                        ->get() ;
                        return view('admin.commerces.show', compact('commerce', 'commerce_d'));
            }
   //show  commerce

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = 1; //==owner

        $commerce = Commerce::find($id);
        return view('admin.commerces.edit', compact('commerce','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatex(CommerceUpdateRequest $request, $id)
    {
        $commerce = Commerce::find($id);
        $commerce->fill($request->all())->save();
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $commerce->fill(['file' => asset($path)])->save();
        }   
        //return redirect()->route('commerces.edit', 
        //$commerce->id)->with('info', 'Info de commerce actualizada con éxito');
    }
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $commerce = Commerce::findOrFail($request->id);
        $commerce->condition = '0';
        $commerce->save();
    }
    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $commerce = Commerce::findOrFail($request->id);
        $commerce->condition = '1';
        $commerce->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commerce = Commerce::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
    //new methods
    public function store(Request $request)
    {
        
        $userid = Auth::user()->id;
        if (!$request->ajax()) return redirect('/');
         
         //Insertar valores de  negocio
         $commercelocation =new Location();
         $commercelocation = Location::create($request->all()); 
         $commercelocation->save();
         $commerce=new Commerce();
         $commerce = Commerce::create($request->all()); 
        //Relacion usuario-negocio
        $commerceuser = CommerceUser::create([
            //'id' => request('commerceuserid'),
            'commerce_id' => $commerce->id,//commerce->id
            'user_id' =>$userid
        ]);
        $commercerole = CommerceRole::create([
            //'id' => request('commerceroleid'),
            'commerce_id' =>  $commerce->id,//commerce->id
            'role_id' => 1//owner in role table
        ]);
        $commerceroleuser = CommerceRoleUser::create([
            'commerce_user_id' =>$commerceuser->id,//commerce->id
            'commerce_role_id' => $commercerole->id //in commerce_role table
            /*
            Se crea una relacion que indica que un comercio puede tener un grupo 
            de usuarios con disintos roles
             */
        ]);  
         
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $commerce->fill(['file' => asset($path)])->save();
        }     
       
    }
    public function update(Request $request)
    {        
        $commerce = Commerce ::find($request->commerce_id);          
        if (!$request->ajax()) return redirect('/');
        //$commerce = Commerce::find($id);
        $commercelocation = Location::findOrFail($request->ubicacion_id);
        $commerce->nombre = $request->nombre;
        $commerce->slug = $request->commerce_slug;
        $commerce->descripcion = $request->descripcion;
        $commerce->hora_apertura = $request->hora_apertura;
        $commerce->hora_cierre = $request->hora_cierre;
        $commerce->num_telefono = $request->num_telefono;
        $commerce->email = $request->email;
        $commerce->condition = $request->condition;
         $commerce->save();
       $commercelocation->calle = $request->calle;
        $commercelocation->numero_interior = $request->numero_interior;
        $commercelocation->numero_exterior = $request->numero_exterior;
        $commercelocation->city = $request->city;
        $commercelocation->state = $request->state;        
        $commercelocation->country = $request->country;
        $commercelocation->latitude = $request->latitude;
        $commercelocation->longitude = $request->longitude;       
        $commercelocation->save();
    
    }
    
    public function selectCommerceRole(Request $request)
    { $commerceroleid = Role::
    select('roles.id as role_id','roles.name as role_name',
    'roles.slug as role_slug','roles.description as role_description','special')
    ->get();
       return ['commerceroleid' => $commerceroleid];
     } 
     
    public function selectCommerceRoleUser(Request $request)
    {      
        $commerceroleuserid = CommerceRoleUser::get();
        return ['commerceroleuserid' => $commerceroleuserid];
     } 
    public function selectCommerceUser(Request $request)
    {
        $commerceuserid = CommerceUser::get();
        return ['commerceuserid' => $commerceuserid];} 
}
