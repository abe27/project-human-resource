<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/Company.json');
        $data = json_decode($json);
        Company::truncate();
        foreach ($data as $r)
        {
            $company = new Company();
            $company->name = $r->name;
            $company->description = $r->description;
            $company->logo_url = $r->logo_url;
            $company->is_active = $r->is_active;
            $company->save();
        }
    }
}
