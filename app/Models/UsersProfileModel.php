<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersProfileModel extends Model
{
    use SoftDeletes;
    protected $table = 'users_profile';
    
    protected $fillable = [
        'id',
        'user_id',
        'lawyer_type',
        'description',
        'profile_image',
        'address',
        'document',
        'enrollment',
        'origin_date',  
   
        
    ];

    protected $dates = ['deleted_at'];

}