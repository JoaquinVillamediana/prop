<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LuxuriesModel extends Model
{
    use SoftDeletes;
    protected $table = 'luxuries';
    
    protected $fillable = [
        'id',
        'name'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}