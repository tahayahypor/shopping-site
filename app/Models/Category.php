<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use sluggable;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ''
            ]
        ];
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function getParentName()
    {
        return is_null($this->parent) ? 'ندارد' : $this->parent->name;
    }


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    
    public function child()
    {
        return $this->hasMany(Category::class , 'parent' , 'id');
    }
}
