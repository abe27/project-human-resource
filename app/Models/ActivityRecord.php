<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class ActivityRecord extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'subject',
        'urls',
        'methods',
        'address',
        'agent',
        'user_id',
    ];
}
