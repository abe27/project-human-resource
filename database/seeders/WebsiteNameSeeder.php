<?php

namespace Database\Seeders;

use App\Models\WebsiteName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class WebsiteNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Website.json');
        $data = json_decode($json);

        WebsiteName::truncate();
        $websiteName = new WebsiteName();
        $websiteName->title = $data->title;
        $websiteName->description = $data->description;
        $websiteName->is_active = true;
        $websiteName->save();
    }
}
