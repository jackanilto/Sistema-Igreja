<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price_monthly',
        'price_yearly',
        'max_members',
        'max_users',
        'features'
    ];

    protected $casts = [
        'features' => 'array'
    ];
}

