<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Section.json');
        $data = json_decode($json);

        Section::truncate();
        foreach ($data as $key) {
            $db = new Section();
            $db->name = $key->name;
            $db->description = $key->description;
            $db->is_active = $key->is_active;
            $db->save();
        }
    }
}
