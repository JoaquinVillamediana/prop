<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class PropertiesModel extends Model implements Viewable
{
    use InteractsWithViews;
    use SoftDeletes;
    protected $table = 'properties';
    
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