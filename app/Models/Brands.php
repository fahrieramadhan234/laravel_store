<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name', 'brand_code', 'brand_logo'];

    public function products()
    {
        return $this->hasMany(Products::class, 'brand_id');
    }

    public function getLogo()
    {
        if (!$this->brand_logo) {
            return asset('/backend/images/products-logo/default-logo.jpg');
        }
        return asset('/backend/images/products-logo/' . $this->brand_logo);
    }
}
