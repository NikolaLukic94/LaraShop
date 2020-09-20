<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'guard_name'];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
