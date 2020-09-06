<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertiesLuxuriesModel extends Model
{
    use SoftDeletes;
    protected $table = 'properties_luxuries';
    
    protected $fillable = [
        'id',
        'properties_id',
        'luxuries_id'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}