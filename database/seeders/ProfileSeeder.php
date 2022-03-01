<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Level;
use App\Models\Position;
use App\Models\PrefixName;
use App\Models\Profile;
use App\Models\Section;
use App\Models\Shift;
use App\Models\Traveling;
use App\Models\User;
use App\Models\Whs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
        $json = Storage::get('public/mock/User.json');
        $data = json_decode($json);

        foreach ($data as $key) {
            $whs = Whs::where('name', $key->whs)->first();
            $user = User::where('email', $key->email)->first();
            $position = Position::where('name', $key->position_id)->first();
            $section = Section::where('name', $key->section_id)->first();
            $department = Department::where('name', $key->department_id)->first();
            $travel = Traveling::where('name', $key->travel_id)->first();
            $shift = Shift::where('name', $key->shift_id)->first();
            $level = Level::where('name', $key->level_id)->first();
            $prefix = PrefixName::where('prefix_en', $key->prefix_id)->first();
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->whs_id = $whs->id;
            $profile->position_id = $position->id;
            $profile->section_id = $section->id;
            $profile->department_id = $department->id;
            $profile->travel_id = $travel->id;
            $profile->shift_id = $shift->id;
            $profile->level_id = $level->id;
            $profile->prefix_id = $prefix->id;
            $profile->id_card_number = $key->id_card_number;
            $profile->nick_name = $key->nick_name;
            $profile->name_th = $key->name_th;
            $profile->name_en = $key->name_en;
            $profile->sexual = $key->sexual;
            $profile->married_status = $key->married_status;
            $profile->military_status = $key->military_status;
            $profile->birth_date = \DateTime::createFromFormat('d/m/Y', $key->birth_date)->format('Y-m-d');
            $profile->start_date = \DateTime::createFromFormat('d/m/Y', $key->start_date)->format('Y-m-d');
            $profile->mobile_no = $key->mobile_no;
            $profile->employee_status = $key->employee_status;
            $profile->avatar_url = $key->avatar_url;
            $profile->is_active = $key->is_active;
            $profile->save();
        }
    }
}
