<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommerceRoleUser extends Model
{
    protected $fillable = [
        'commerce_role_id', 'commerce_user_id'
    ];

    public function users(){
        return $this->belongsToMany(CommerceUser::class)->withTimestamps();
    }
    public function commerces(){
        return $this->belongsToMany(CommerceRole::class)->withTimestamps();
    }
}
