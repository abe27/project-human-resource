<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Vehicle.json');
        $data = json_decode($json);

        Vehicle::truncate();
        foreach ($data as $key) {
            $db = new Vehicle();
            $db->name = $key->name;
            $db->description = $key->description;
            $db->is_active = $key->is_active;
            $db->save();
        }
    }
}
