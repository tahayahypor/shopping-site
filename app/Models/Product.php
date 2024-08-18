<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use sluggable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'image',
        'inventory',
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ''
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
