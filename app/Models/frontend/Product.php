<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'image',
        'inventory',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}
