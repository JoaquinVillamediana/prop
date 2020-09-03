<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyModel extends Model
{
    use SoftDeletes;
    protected $table = 'currency';
    
    protected $fillable = [
        'name',
       'id',
       'symbol'
        
        
        
    ];

    protected $dates = ['deleted_at'];

}