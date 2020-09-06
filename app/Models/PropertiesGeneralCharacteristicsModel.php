<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertiesGeneralCharacteristicsModel extends Model
{
    use SoftDeletes;
    protected $table = 'properties_general_characteristics';
    
    protected $fillable = [
        'id',
        'properties_id',
        'general_characteristics_id'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}