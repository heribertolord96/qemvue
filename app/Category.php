<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'department_id','name', 'slug', 'body',
        'condition'
    ];

    public function department(){
        return $this->belongsTo(Department::class);//Pertenece a una categoria
    }


}
