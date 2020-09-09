<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AccountCustomer extends Authenticatable
{
    use Notifiable;

    protected $table = 'account_customer';
    protected $fillable =
    [
        'email',
        'password',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
