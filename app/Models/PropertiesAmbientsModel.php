<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertiesAmbientsModel extends Model
{
    use SoftDeletes;
    protected $table = 'propieties_ambientes';
    
    protected $fillable = [
        'id',
        'propietie_id',
        'ambientes_id'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}