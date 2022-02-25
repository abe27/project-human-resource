<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();
        $json = Storage::get('public/mock/User.json');
        $data = json_decode($json);

        foreach ($data as $key)
        {
            $user = User::where('email', $key->email)->first();
            $profile = Profile::where('user_id', $user->id)->first();
            $emp = new Employee();
            $emp->empcode = $key->empcode;
            $emp->profile_id = $profile->id;
            $emp->is_active = $key->is_active;
            $emp->save();
        }
    }
}
