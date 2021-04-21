<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technical_SupportModel extends Model
{
    use SoftDeletes;
    protected $table = 'technical_support';
    
    protected $fillable = [
        'id',
        'title',
        'text',
        'user_id',
        
        
        
   
        
    ];

    protected $dates = ['deleted_at'];

}