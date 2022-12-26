<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
/*
category::create([
    'title' => 'Design',
    'slug' => 'Des'
])
post::create([
    'title' => 'dess',
    'slug' => 't3',
    'category_id' => 2,
    'content' => 'dessss loremlorem loremlorem loremlorem lorem'
])
*/