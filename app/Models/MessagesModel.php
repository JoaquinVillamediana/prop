<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessagesModel extends Model
{
    use SoftDeletes;
    protected $table = 'messages';
    
    protected $fillable = [
        'user_from_id',
        'user_to_id',
        'message'
       
        
        
        
    ];

    protected $dates = ['deleted_at'];

}