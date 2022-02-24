<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrefixName extends Model
{
    use HasFactory;

    public $fillable = [
        'prefix_th',
        'prefix_en',
        'is_active',
    ];
}
