<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertiesGeneralCharacteristicsModel extends Model
{
    use SoftDeletes;
    protected $table = 'propieties_caracteristicas_generales';
    
    protected $fillable = [
        'id',
        'propietie_id',
        'caracteristicas_generales_id'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}