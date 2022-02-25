<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        // For Administrator
        $json = Storage::get('public/mock/Administrator.json');
        $data = json_decode($json);
        foreach ($data as $key) {
            $db = new User();
            $db->name = $key->name;
            $db->email = $key->email;
            $db->password = Hash::make($key->password);
            $db->is_verified = $key->is_verified;
            $db->save();
        }

        // For User
        $json = Storage::get('public/mock/User.json');
        $data = json_decode($json);
        foreach ($data as $key) {
            $db = new User();
            $db->name = $key->name;
            $db->email = $key->email;
            $db->password = Hash::make($key->password);
            $db->is_verified = $key->is_active;
            $db->save();
        }
    }
}
