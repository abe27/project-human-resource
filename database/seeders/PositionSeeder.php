<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Position.json');
        $data = json_decode($json);

        Position::truncate();
        foreach ($data as $key) {
            $db = new Position();
            $db->name = $key->name;
            $db->description = $key->description;
            $db->is_active = $key->is_active;
            $db->save();
        }
    }
}
