<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

    class Commerce extends Model
{
    protected $fillable = [
        'id','nombre', 'slug', 'descripcion', 'hora_apertura',
        'hora_cierre', 'num_telefono', 'email','file', 'ubicacion_id'
    ];

    
    public function users(){
        return $this->belongsToMany(CommerceUser::class)->withTimestamps();//El usuario puede pertenecer a muchos grupos
    }
    public function commerce_role_users(){
        return $this->belongsToMany(CommerceRoleUser::class)->withTimestamps();//El usuario puede pertenecer a muchos grupos
    }
    public function departments(){
        return $this->belongsTo(Department::class)->withTimestamps();//Una tienda puede tener muchos departamentos
    }
}
