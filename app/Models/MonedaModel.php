<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonedaModel extends Model
{
    use SoftDeletes;
    protected $table = 'currency';
    
    protected $fillable = [
        'name',
       
        
        
        
    ];

    protected $dates = ['deleted_at'];

}