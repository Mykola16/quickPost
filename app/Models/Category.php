<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //use HasFactory;

    //protected $table = 'categories';

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function allSubCategories()
    {
        return $this->hasMany(Category::class)->with('allSubCategories');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
