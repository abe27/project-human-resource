<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class CompanyAddress extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'company_id',
        'address_1',
        'address_2',
        'street',
        'tombon_id',
        'tel_no',
        'tel_ext',
        'fax_no',
        'is_active',
    ];
}
