<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'commerce_id','name', 'slug', 'body',
        'fecha_inicio','fecha_fin','hora_inicio','hora_fin','file'
    ];
}
