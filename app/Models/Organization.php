<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Organization extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'emp_id',
        'leader_id',
        'is_active',
    ];
}
