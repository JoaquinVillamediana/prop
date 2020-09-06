<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmbientsModel extends Model
{
    use SoftDeletes;
    protected $table = 'ambients';
    
    protected $fillable = [
        'id',
        'name',
       
        
        
        
    ];

    protected $dates = ['deleted_at'];

}