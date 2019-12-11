<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name', 'slug', 'body','fecha_inicio','fecha_fin','hora_inicio','hora_fin','file', 'commerce_id'
    ];
}
