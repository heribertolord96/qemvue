<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommerceUser extends Model
{
    protected $fillable = [
        'id','commerce_id', 'user_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function commerces(){
        return $this->belongsToMany(Commerce::class)->withTimestamps();
    }
}
