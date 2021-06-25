<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'author',
        'title',
        'subtitle',
        'image',
        'pub_date',
        'content',
        'slug',
        'categories_id',
        'inHome'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
