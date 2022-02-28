<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class MenuItem extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'is_dash',
        'seq',
        'menu_group',
        'name',
        'font_icon',
        'menu_method',
        'route_name',
        'text_color',
        'over_hover',
        'description',
        'for_admin',
        'is_active',
    ];
}
