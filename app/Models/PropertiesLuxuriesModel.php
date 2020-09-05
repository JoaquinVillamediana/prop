<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertiesLuxuriesModel extends Model
{
    use SoftDeletes;
    protected $table = 'propieties_comodidades';
    
    protected $fillable = [
        'id',
        'propietie_id',
        'comodidades_id'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}