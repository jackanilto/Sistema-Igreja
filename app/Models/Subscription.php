<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'church_id',
        'plan_id',
        'starts_at',
        'ends_at',
        'status'
    ];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}

