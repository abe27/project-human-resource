<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'user_id',
        'position_id',
        'section_id',
        'department_id',
        'shift_id',
        'level_id',
        'prefix_id',
        'id_card_number',
        'nick_name',
        'name_th',
        'name_en',
        'sexual',
        'married_status',
        'military_status',
        'birth_date',
        'start_date',
        'mobile_no',
        'employee_status',
        'avatar_url',
        'is_active',
    ];
}
