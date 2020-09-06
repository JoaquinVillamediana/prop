<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertiesServicesModel extends Model
{
    use SoftDeletes;
    protected $table = 'properties_services';
    
    protected $fillable = [
        'id',
        'properties_id',
        'services_id'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}