<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesModel extends Model
{
    use SoftDeletes;
    protected $table = 'services';
    
    protected $fillable = [
        'id',
        'name'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}