<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Administrator.json');
        $data = json_decode($json);

        Administrator::truncate();
        foreach ($data as $key) {
            $user = User::where('email', $key->email)->first();
            $db = new Administrator();
            $db->user_id = $user->id;
            $db->is_active = true;
            $db->save();
        }
    }
}
