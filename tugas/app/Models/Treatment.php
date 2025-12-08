<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'category', 'price', 'duration', 'status', 'popularity', 'image'
    ];

    protected $casts = [
        'price' => 'float',
        'duration' => 'integer',
        'popularity' => 'integer',
    ];
}
