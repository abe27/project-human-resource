<?php

namespace Database\Seeders;

use App\Models\Whs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class WhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Whs.json');
        $data = json_decode($json);

        Whs::truncate();
        foreach ($data as $key) {
            $whs = new Whs();
            $whs->name = $key->name;
            $whs->description = $key->description;
            $whs->is_active = $key->is_active;
            $whs->save();
        }
    }
}
