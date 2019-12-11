<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommerceRole extends Model
{
    protected $fillable = [
        'id','commerce_id', 'role_id'
    ];
    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    public function commerces(){
        return $this->belongsToMany(Commerce::class)->withTimestamps();
    }
}
