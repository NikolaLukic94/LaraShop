<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'first_name', 
        'last_name',
        'phone_number',
        'address_line_1',
        'address_line_2', 
        'city',
        'county',
        'zip',
        'country',
        'user_id' 
    ];

    public function productType()
    {
        return $this->belongsTo(User::class);
    }
}
