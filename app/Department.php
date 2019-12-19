<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'commerce_id', 'name', 'slug', 'body',
        'condition'
    ];
    public function commerce()
    {
        return $this->belongsTo(Commerce::class);//Un departamento pertenece a una tienda
    }
    public function categories()
    {
        return $this->hasMany(Category::class);//Un departamento pertenece a una tienda
    }
}
