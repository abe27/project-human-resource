<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Shift.json');
        $data = json_decode($json);

        Shift::truncate();
        foreach ($data as $key) {
            $shift = new Shift();
            $shift->name = $key->name;
            $shift->description = $key->description;
            $shift->regular_color = $key->regular_color;
            $shift->is_active = $key->is_active;
            $shift->save();
        }
    }
}
