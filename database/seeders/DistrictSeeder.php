<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Amphures.json');
        $data = json_decode($json);

        District::truncate();
        foreach ($data as $key) {
            $provice = Province::where('code_id', $key->province_id)->first();
            $district = new District();
            $district->district_id = $key->id;
            $district->province_id = $provice->id;
            $district->district_name =$key->name_th;
            $district->description = $key->name_en;
            $district->is_active = true;
            $district->save();
        }
    }
}
