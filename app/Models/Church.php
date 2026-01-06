<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $fillable = [
        'name',
        'subdomain',
        'email',
        'active',
    ];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

