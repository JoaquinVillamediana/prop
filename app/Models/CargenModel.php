<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargenModel extends Model
{
    use SoftDeletes;
    protected $table = 'caracteristicas_generales';
    
    protected $fillable = [
        'name'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}