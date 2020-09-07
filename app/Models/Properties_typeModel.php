<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Properties_typeModel extends Model
{
    use SoftDeletes;
    protected $table = 'properties_type';
    
    protected $fillable = [
        'name',
     
        
   
        
    ];

    protected $dates = ['deleted_at'];

}