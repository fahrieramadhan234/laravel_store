<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable =
    [
        'first_name',
        'last_name',
        'email',
        'gender',
        'phone_number',
        'address',
        'avatar'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');;
    }


    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('backend/images/customer/default.jpg');
        }

        return asset('backend/images/customer/' . $this->avatar);
    }
}
