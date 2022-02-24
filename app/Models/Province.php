<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Province extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'geo_id',
        'code_id',
        'name',
        'description',
        'is_active',
    ];
}
