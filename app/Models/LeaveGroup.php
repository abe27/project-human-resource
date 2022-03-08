<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class LeaveGroup extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = [
        'name',
        'description',
        'limit_day',
        'is_active',
    ];
}
