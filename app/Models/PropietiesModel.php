<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class PropietiesModel extends Model implements Viewable
{
    use InteractsWithViews;
    use SoftDeletes;
    protected $table = 'propieties';
    
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'operation_type_id',
        'propietie_type_id',
        'price',
        'rooms',
        'visible_at',
        'visible'
        
        
        
    ];

    protected $dates = ['deleted_at'];

}