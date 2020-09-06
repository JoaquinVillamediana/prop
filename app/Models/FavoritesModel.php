<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoritesModel extends Model
{
    use SoftDeletes;
    protected $table = 'favoritos';
    
    protected $fillable = [
        'user_id',
        'propertie_id',
        'status'
        
        
        
    ];

    protected $dates = ['deleted_at'];

}