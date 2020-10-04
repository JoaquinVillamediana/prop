<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenovationsModel extends Model
{
    use SoftDeletes;
    protected $table = 'renovation';
    
    protected $fillable = [
        'id',
        'user_id',
        'user_plan_id',
        'pay_id_mp',
        'expiration_at'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}