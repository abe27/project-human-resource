<?php

namespace Database\Seeders;

use App\Models\PrefixName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PrefixNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Prefix.json');
        $data = json_decode($json);

        PrefixName::truncate();
        foreach ($data as $key) {
            $db = new PrefixName();
            $db->prefix_th = $key->name;
            $db->prefix_en = $key->description;
            $db->is_active = $key->is_active;
            $db->save();
        }
    }
}
