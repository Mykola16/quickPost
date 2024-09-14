<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = ['user_id', 'product_id', 'liked'];


    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
