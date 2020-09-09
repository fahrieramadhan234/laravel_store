<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name'];

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
