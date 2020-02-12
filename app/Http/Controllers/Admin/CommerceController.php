<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use App\Commerce;
use App\Department;
use App\Category;
use App\Product;
use App\CommerceUser;
use App\CommerceRole;
use App\Role;
use App\Location;
use App\User;
use App\CommerceRoleUser;
use Illuminate\Support\Facades\Auth;

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

    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $user =  Auth::user()->id;
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar == '') {
            $commerces = Commerce::orderBy('commerces.nombre', 'asc')
                //->join('commerces', 'commerce_users.commerce_id', '=', 'commerces.id')
                //->join('users', 'commerce_users.user_id', '=', 'users.id')
                ->join('locations', 'commerces.ubicacion_id', '=', 'locations.id')
                //->join('commerce_roles', 'commerces.id', '=', 'commerce_roles.commerce_id')
                //->join('roles', 'commerce_roles.role_id', '=', 'roles.id')
                //->where ('commerces.id','=', 'commerce_id')
                ->select(
                    //'users.id as user_id',
                    'commerces.id as commerce_id',
                    'commerces.nombre',
                    //'commerces.tipo',
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
                    'locations.city as location',
                    //'locations.state ',
                    'locations.country',
                    'locations.longitude',
                    'locations.latitude'

                )
                ->paginate(3);

            return [
                'pagination' => [
                    'total'        => $commerces->total(),
                    'current_page' => $commerces->currentPage(),
                    'per_page'     => $commerces->perPage(),
                    'last_page'    => $commerces->lastPage(),
                    'from'         => $commerces->firstItem(),
                    'to'           => $commerces->lastItem(),
                ],
                'commerces' => $commerces
            ];
            //Crear condicion para mostrar opciones sobre el item, si es del usuario

            //return view('admin.commerces.index', compact('commerces'));
        } else {
            $commerces = Commerce::orderBy('commerces.nombre', 'asc')
                //->join('commerces', 'commerce_users.commerce_id', '=', 'commerces.id')
                //->join('users', 'commerce_users.user_id', '=', 'users.id')
                ->join('locations', 'commerces.ubicacion_id', '=', 'locations.id')
                //->join('commerce_roles', 'commerces.id', '=', 'commerce_roles.commerce_id')
                //->join('roles', 'commerce_roles.role_id', '=', 'roles.id')
                //->where ('commerces.id','=', 'commerce_id')
                ->select(
                    //'users.id as user_id',
                    'commerces.id as commerce_id',
                    'commerces.nombre',
                    //'commerces.tipo',
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
                    'locations.latitude'

                )
                ->where($criterio, 'like', '%' . $buscar . '%')
                ->paginate(3);

            return [
                'pagination' => [
                    'total'        => $commerces->total(),
                    'current_page' => $commerces->currentPage(),
                    'per_page'     => $commerces->perPage(),
                    'last_page'    => $commerces->lastPage(),
                    'from'         => $commerces->firstItem(),
                    'to'           => $commerces->lastItem(),
                ],
                'commerces' => $commerces
            ];
            //
        }
    }

    public function my_commerces(Request $request)
    {
        $user = Auth::user()->id;
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar == '') {
            /*$commerces =CommerceUser::orderBy('commerces.nombre','asc')
        ->join ( 'commerces', 'commerce_users.commerce_id' ,'=' ,'commerces.id')
                ->join('users', 'commerce_users.user_id','=','users.id')
                */
            $commerces = CommerceUser::orderBy('commerces.nombre', 'asc')
                ->join('commerces', 'commerce_users.commerce_id', '=', 'commerces.id')
                ->join('users', 'commerce_users.user_id', '=', 'users.id')
                ->join('locations', 'commerces.ubicacion_id', '=', 'locations.id')
                ->join('commerce_roles', 'commerces.id', '=', 'commerce_roles.commerce_id')
                ->join('roles', 'commerce_roles.role_id', '=', 'roles.id')
                ->where('users.id', '=', $user)
                ->select(
                    'users.id as user_id',
                    'commerces.id as commerce_id',
                    'commerces.nombre',
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
                ->get();

            return $commerces;
        } else {
            $commerces = CommerceUser::orderBy('commerces.nombre', 'asc')
                ->join('commerces', 'commerce_users.commerce_id', '=', 'commerces.id')
                ->join('users', 'commerce_users.user_id', '=', 'users.id')
                ->where('users.id', '=', '2')
                ->where($criterio, 'like', '%' . $buscar . '%')
                ->paginate(3);
            return view('admin.commerces.my_commerces', compact('my_commerces', 'commerces'));
        }
    }

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
        $uid = Auth::id();
        return view('admin.commerces.create',  compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show  commerces from commerces.index
    public function show($commerce_slug)
    {
        //return  //Commerce::where('commerce_slug', $commerce_slug)->first();

        // $commerce = Commerce::find($slug);
        return Commerce::get('all')
            ->join('commerce_users', 'commerce_users.commerce_id', '=', 'commerces.id')
            ->join('departments', 'departments.commerce_id', '=', 'commerces.id')
            ->join('categories', 'categories.department_id', '=', 'departments.id')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->get('nombre')
            ->where('commerces.slug', $commerce_slug)->first();
        //return view('admin.commerces.show', compact('commerce'));
    }
    //show  commerces from commerces.my_commerces
    public function getcommerce($commerce_id) //Para acceder a los detalles de un item desde el  listado
    {
        /*$cmmerce_d  = Commerce::where('nombre', $nombre)->first();
                        $commerce_id    = Commerce::where('nombre', $nombre)->pluck('id')->first();*/

        $commerce = Commerce::join('commerce_users', 'commerce_users.commerce_id', '=', 'commerce_id')
            ->join('departments', 'departments.commerce_id', '=', 'commerces.id')
            ->join('categories', 'categories.department_id', '=', 'departments.id')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->where('departments.commerce_id', $commerce_id)

            ->get();
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
        return view('admin.commerces.edit', compact('commerce', 'roles'));
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
        try {
            DB::beginTransaction();
            //Insertar valores de  negocio
            $commercelocation = new Location();
            //$commercelocation = Location::create($request->all()); 
            $commercelocation->id = ($commercelocation->id*2);
            $commercelocation->calle = $request->calle;
            $commercelocation->numero_interior = $request->numero_interior;
            $commercelocation->numero_exterior = $request->numero_exterior;
            $commercelocation->city = $request->city;
            $commercelocation->state = $request->state;
            $commercelocation->country = $request->country;
            $commercelocation->latitude = $request->latitude;
            $commercelocation->longitude = $request->longitude;
            $commercelocation->save();
            $commerce = new Commerce();
            $commerce->nombre = $request->nombre;
            $commerce->slug = $request->commerce_slug;
            $commerce->descripcion = $request->descripcion;
            $commerce->hora_apertura = $request->hora_apertura;
            $commerce->hora_cierre = $request->hora_cierre;
            $commerce->num_telefono = $request->num_telefono;
            $commerce->email = $request->email;
            $commerce->condition = $request->condition;
            $commerce->ubicacion_id =$commercelocation->id;
            $commerce->save();
            //$commerce = Commerce::create($request->all()); 
            //Relacion usuario-negocio
            $commerceuser = CommerceUser::create([
                //'id' => request('commerceuserid'),
                'commerce_id' => $commerce->id, //commerce->id
                'user_id' => $userid
            ]);
            $commercerole = CommerceRole::create([
                'commerce_id' =>  $commerce->id, //commerce->id
                'role_id' => 1 //owner in role table
            ]);
            $commerceroleuser = CommerceRoleUser::create([
                'commerce_user_id' => $commerceuser->id, //commerce->id
                'commerce_role_id' => $commercerole->id //in commerce_role table
                /*
            Se crea una relacion que indica que un comercio puede tener un grupo 
            de usuarios con disintos roles
             */
            ]);

            if ($request->file('image')) {
                $path = Storage::disk('public')->put('image',  $request->file('image'));
                $commerce->fill(['file' => asset($path)])->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
    public function update(Request $request)
    {

        //$commerce = Commerce::find($request->commerce_id);
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();
            //$commerce = Commerce::find($id);
            $commercelocation = Location::findOrFail($request->ubicacion_id);
            $commerce = Commerce::findOrFail($request->commerce_id);
            $commerce->nombre = $request->nombre;
            $commerce->slug = $request->commerce_slug;
            $commerce->descripcion = $request->descripcion;
            $commerce->hora_apertura = $request->hora_apertura;
            $commerce->hora_cierre = $request->hora_cierre;
            $commerce->num_telefono = $request->num_telefono;
            $commerce->email = $request->email;
            $commerce->condition = $request->condition;
            $commerce->ubicacion_id = $request->ubicacion_id;
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
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function selectCommerceRole(Request $request)
    {
        $commerceroleid = Role::select(
            'roles.id as role_id',
            'roles.name as role_name',
            'roles.slug as role_slug',
            'roles.description as role_description',
            'special'
        )
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
        return ['commerceuserid' => $commerceuserid];
    }
    //change methods


    /*public function department(): JsonResponse
    {
      $departments = Department::wherecommerce_id(request('commerce'))
      ->select('id as department_id', 'commerce_id', 'name')
                 ->get();
                 return response()->json($departments);
       //Hay que obtener unicamente los items propios::))
    }*/
    public function department(Request $request): JsonResponse
    {
        $commerce_d = $request->commerce_id;
        //$commerce_id    = Commerce::where('commerces.slug','=', $commerce_d )->pluck('commerces.id')->first();
        return response()->json(Department::select('id as department_id', 'commerce_id', 'name','body','condition as department_condition')
            ->where('condition', 1)
            ->get());
    }
    public function category(): JsonResponse
    {
        $categories = Category::wheredepartment_id(request('department'))
            ->select('categories.name as category_name', 'categories.id as category_id','condition')
            ->where('condition', 1)
            ->orderBy('name', 'asc')
            ->get();
        return response()->json($categories);
    }
    public function product(Request $request): JsonResponse
    {
        $buscar = $request->buscar;
        if ($buscar == '') {
            $products = Product::wherecategory_id(request('category'))
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('departments', 'categories.department_id', '=', 'departments.id')
                ->join('commerces', 'departments.commerce_id', '=', 'commerces.id')
                ->select(
                    'products.name as product_name',
                    'products.id as product_id',
                    'products.descripcion as product_description',
                    'products.presentacion as product_presentation',
                    'products.precio_venta',
                    'products.condition as product_condition',
                    'commerces.nombre as commerce_product'
                )
                ->get();
            //->paginate(10);
            return response()->json($products);
            /*
            return response()->json([
                'pagination' => [
                    'total'        => $products->total(),
                    'current_page' => $products->currentPage(),
                    'per_page'     => $products->perPage(),
                    'last_page'    => $products->lastPage(),
                    'from'         => $products->firstItem(),
                    'to'           => $products->lastItem(),
                ],
                'products' => response()->json($products)
            ]);
            */
        } else {
            $products = Product::wherecategory_id(request('category'))
                ->select(
                    'name as product_name',
                    'id as product_id',
                    'descripcion as product_description',
                    'presentacion as product_resentation',
                    'precio_venta',
                    'category_id',
                    'condition as product_condition'
                )
                ->where('name', '%' . $buscar . '%')
                //->get();
                ->paginate(10);

            return response()->json([
                'pagination' => [
                    'total'        => $products->total(),
                    'current_page' => $products->currentPage(),
                    'per_page'     => $products->perPage(),
                    'last_page'    => $products->lastPage(),
                    'from'         => $products->firstItem(),
                    'to'           => $products->lastItem(),
                ],
                'products' => response()->json($products)
            ]);
        }
    }
}
