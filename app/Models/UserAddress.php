<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public function productType()
    {
        return $this->belongsTo(User::class);
    }
}
