<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiciosModel extends Model
{
    use SoftDeletes;
    protected $table = 'services';
    
    protected $fillable = [
        'name'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}