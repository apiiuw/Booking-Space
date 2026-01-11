<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'url',
        'type',
        'name',
        'capacity',
        'facilities',
        'borrow_days',
        'borrow_time_start',
        'borrow_time_end',
        'description',
        'image',
        'is_active'
    ];
}
