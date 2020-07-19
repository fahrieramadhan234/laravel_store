<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable =
    [
        'account_customer_id',
        'first_name',
        'last_name',
        'sex',
        'phone_number',
        'address',
        'avatar'
    ];

    public function account_customer()
    {
        return $this->belongsTo(AccountCustomer::class);
    }


    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('backend/images/customer/default.jpg');
        }

        return asset('backend/images/customer/' . $this->avatar);
    }
}
