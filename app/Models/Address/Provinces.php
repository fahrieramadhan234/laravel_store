<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'provinces';
}
