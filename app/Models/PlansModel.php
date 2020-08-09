<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlansModel extends Model
{
    use SoftDeletes;
    protected $table = 'publish_plans';
    
    protected $fillable = [
        'name',
        'description1',
        'description2',
        'description3',
        'user_type',
        'num_add',
        'time',
        'price',
        'visible_at',
        'visible'
        
        
        
    ];

    protected $dates = ['deleted_at'];

}