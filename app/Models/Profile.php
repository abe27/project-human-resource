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
        'whs_id',
        'position_id',
        'section_id',
        'department_id',
        'travel_id',
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

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function whs() {
        return $this->hasOne(Whs::class, 'id', 'whs_id');
    }

    public function position() {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }

    public function section() {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }

    public function department() {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function travel() {
        return $this->hasOne(Traveling::class, 'id', 'travel_id');
    }

    public function shift() {
        return $this->hasOne(Shift::class, 'id', 'shift_id');
    }

    public function level() {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }

    public function prefix() {
        return $this->hasOne(PrefixName::class, 'id', 'prefix_id');
    }

    public function address() {
        return $this->hasMany(EmployeeAddress::class, 'profile_id', 'id');
    }

    public function empcode() {
        return $this->hasOne(Employee::class, 'profile_id', 'id');
    }

}
