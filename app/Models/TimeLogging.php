<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class TimeLogging extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'emp_id',
        'scan',
        'on_date',
        'on_time',
        'on_machine',
        'is_active',
    ];
}
