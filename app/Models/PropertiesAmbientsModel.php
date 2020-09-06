<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertiesAmbientsModel extends Model
{
    use SoftDeletes;
    protected $table = 'properties_ambients';
    
    protected $fillable = [
        'id',
        'properties_id',
        'ambients_id'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}