<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    protected $table = 'product_picture';
    protected $fillable =
    [
        'product_id',
        'product_pict'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
