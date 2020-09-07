<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralCharacteristicsModel extends Model
{
    use SoftDeletes;
    protected $table = 'general_characteristics';
    
    protected $fillable = [
        'id',
        'name',
       
        
        
        
    ];

    protected $dates = ['deleted_at'];

}