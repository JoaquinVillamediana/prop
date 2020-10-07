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
        'introduction',
        'user_id',
        'direction',
        'priority',
        'operation_type_id',
        'propietie_type_id',
        'price',
        'rooms',
        'bedrooms',
        'bathrooms',
        'expenses',
        'size',
        'years',
        'location_id',
        'currency_id',
        'visible_at',
        'visible'
        
        
        
    ];


    protected $casts = [
        'location_id'  =>  'string'
    ];

    protected $dates = ['deleted_at'];

}