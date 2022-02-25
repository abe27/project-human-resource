<?php

namespace Database\Seeders;

use App\Models\Geography;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class GeographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Geographies.json');
        $data = json_decode($json);

        Geography::truncate();
        foreach ($data as $key)
        {
            $geography = new Geography();
            $geography->geo_id = $key->id;
            $geography->name = $key->name;
            $geography->description = '-';
            $geography->is_active = true;
            $geography->save();
        }
    }
}
