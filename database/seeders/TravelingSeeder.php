<?php

namespace Database\Seeders;

use App\Models\Traveling;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TravelingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Traveling.json');
        $data = json_decode($json);

        Traveling::truncate();
        foreach ($data as $key) {
            $db = new Traveling();
            $db->name = $key->name;
            $db->description = $key->description;
            $db->is_active = $key->is_active;
            $db->save();
        }
    }
}
