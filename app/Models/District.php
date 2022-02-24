<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class District extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'district_id',
        'province_id',
        'district_name',
        'description',
        'is_active',
    ];
}
