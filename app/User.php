<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    
    public function commerce_users(){
        return $this->belongsToMany(CommerceUser::class)->withTimestamps();//El usuario puede pertenecer a muchos grupos
    }

    public function setSession ($roles){
        if(count($roles) == 1){
            Session::put(
                ['role_id'=>$roles[0]['id'], //SELECT  id from rols as rol_id
                    'role_name'=>$roles[0]['name'],
                    'user_id'=>$this->id,
                    'user_name'=>$this->name,           
                    //'persona'=>$this->user_name,
                    //select id from personas where id =  usuarios.id
                ]);
            }
        }
    
        //Obtener rol de usuario al estar en un comercio, para mostrar
        public function setSessionCommerce ($roles){
            if(count($roles) == 1){
                Session::put(
                    ['role_id'=>$roles[0]['id'], //SELECT  id from rols as rol_id
                        'role_name'=>$roles[0]['name'],
                        'user_id'=>$this->id,
                        'user_name'=>$this->name,           
                        //'persona'=>$this->user_name,
                        //select id from personas where id =  usuarios.id
                    ]);
                }
            }
}

