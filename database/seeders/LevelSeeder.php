<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Level.json');
        $data = json_decode($json);

        Level::truncate();
        foreach ($data as $key) {
            $level = new Level();
            $level->name = $key->name;
            $level->description = $key->description;
            $level->is_active = $key->is_active;
            $level->save();
        }
    }
}
