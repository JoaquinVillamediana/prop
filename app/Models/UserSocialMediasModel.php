<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSocialMediasModel extends Model
{
    use SoftDeletes;
    protected $table = 'user_social_medias';
    
    protected $fillable = [
        'id',
        'user_id',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'website',  
   
        
    ];

    protected $dates = ['deleted_at'];

}