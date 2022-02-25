<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Department.json');
        $data = json_decode($json);

        Department::truncate();
        foreach ($data as $key) {
            $db = new Department();
            $db->name = $key->name;
            $db->description = $key->description;
            $db->is_active = $key->is_active;
            $db->save();
        }
    }
}
