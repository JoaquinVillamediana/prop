<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPlansActivesModel extends Model
{
    use SoftDeletes;
    protected $table = 'user_plans_actives';
    
    protected $fillable = [
        'id',
        'user_id',
        'add_quantity',
        'plan_id',
        'pay_id_mp'
        
        
        
        
    ];

    protected $dates = ['deleted_at'];

}