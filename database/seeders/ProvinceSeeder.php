<?php

namespace Database\Seeders;

use App\Models\Geography;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Provinces.json');
        $data = json_decode($json);

        Province::truncate();
        foreach ($data as $key) {
            $geography = Geography::where('geo_id', $key->geography_id)->first();
            $province = new Province();
            $province->geo_id = $geography->id;
            $province->code_id = $key->id;
            $province->name = $key->name_th;
            $province->description = Str::upper($key->name_en);
            $province->is_active = true;
            $province->save();
        }
    }
}
