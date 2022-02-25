<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class PrefixName extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'prefix_th',
        'prefix_en',
        'is_active',
    ];
}
