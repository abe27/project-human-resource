<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Tombon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TombonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Tombons.json');
        $data = json_decode($json);

        Tombon::truncate();
        foreach ($data as $key)
        {
            $district = District::where('district_id', Str::substr($key->id, 0, 4))->first();
            $tombon = new Tombon();
            $tombon->zip_code = $key->zip_code;
            $tombon->name = $key->name_th;
            $tombon->description = $key->name_en;
            $tombon->district_id = $district->id;
            $tombon->is_active = true;
            $tombon->save();
        }
    }
}
