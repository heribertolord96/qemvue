<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Commerce;
use App\Department;
use App\Category;
use App\Product;
use App\CommerceUser;
use App\CommerceRole;
use App\Role;
use App\User;
use App\CommerceRoleUser;
use Illuminate\Support\Facades\Auth;

class CommerceUserController extends Controller
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
    public function index()
    {
        $users = User::select('name as user_name','id as user_id','email as user_email');
        return $users;
       /* $roles = Role::select('name as role_name','id as role_id');
        return $roles;*/
    }
    public function adduser(Request $request)
    {
        $commerce_d = $request->commerce_id;
        $user_id = $request->user_id;
        $role_id = $request->role_id;
        $commerce    = Commerce::where('commerces.slug','=', $commerce_d )
        ->pluck('commerces.id')->first();
       
        //Relacion usuario-negocio
        $commerceuser = CommerceUser::create([
            //'id' => request('commerceuserid'),
            'commerce_id' => $commerce->id, //commerce->id
            'user_id' => $user_id
        ]);
        $commercerole = CommerceRole::create([
            'commerce_id' =>  $commerce->id, //commerce->id
            'role_id' => $role_id //owner in role table
        ]);
        $commerceroleuser = CommerceRoleUser::create([
            'commerce_user_id' => $commerceuser->id, //commerce->id
            'commerce_role_id' => $commercerole->id //in commerce_role table
            /*
    Se crea una relacion que indica que un comercio puede tener un grupo 
    de usuarios con disintos roles
     */
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveuser(Request $request)//invitar usuarios/guardar
    {
        $userowner = Auth::user()->id;
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();
            //Insertar valores de  negocio
            $commerce = Commerce::findOrFail($request->commerce_id);
            $user_id = User::findOrFail($request->user_id);
            $role_id = Role::findOrFail($request->role_id);//seleccionar role
           
            //$commerce = Commerce::create($request->all()); 
            //Relacion usuario-negocio
            $commerceuser = CommerceUser::create([
                //'id' => request('commerceuserid'),
                'commerce_id' => $commerce, //commerce->id
                'user_id' => $user_id
            ]);
            $commercerole = CommerceRole::create([
                'commerce_id' =>  $commerce, //commerce->id
                'role_id' => $role_id //owner in role table
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

    
    public function users(Request $request)
    {
        /*select `users`.`id` as `user_id`, `commerces`.`id` as `commerce_id`, `commerces`.`nombre`, users.name as user, users.email as email,
`roles`.`id` as `role_id`, `roles`.`name` as `role_name`

 from `commerce_users` 
 inner join `commerces` on `commerce_users`.`commerce_id` = commerces.id
 inner join `users` on `commerce_users`.`user_id` = `users`.`id` 
 inner join `commerce_roles` on commerce_users.commerce_id = `commerce_roles`.`commerce_id` 
 inner join `roles` on `commerce_roles`.`role_id` = `roles`.`id`
    */
 $users = CommerceRoleUser::get();
 return $users;
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommerceUser  $commerceUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CommerceUser $commerceUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommerceUser  $commerceUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommerceUser $commerceUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommerceUser  $commerceUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommerceUser $commerceUser)
    {
        //
    }
}
