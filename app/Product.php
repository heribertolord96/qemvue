<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug','name', 'slug', 'codigo',
        'descripcion','stock','file','presentacion','precio_venta','category_id','condition'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
