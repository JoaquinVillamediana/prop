<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalitiesModel extends Model
{

    protected $table = 'localidades';
    
    protected $fillable = [
        'nombre',
        'provincia_nombre',
        'provincia_id',
        'municipio_nombre'
        
    ];


}