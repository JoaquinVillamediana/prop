<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmbientesModel extends Model
{
    use SoftDeletes;
    protected $table = 'ambientes';
    
    protected $fillable = [
        'name',
       
        
        
        
    ];

    protected $dates = ['deleted_at'];

}