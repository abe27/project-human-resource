<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call([WebsiteNameSeeder::class]);
        $this->call([MenuItemSeeder::class]);
        $this->call([WhsSeeder::class]);
        $this->call([GeographySeeder::class]);
        $this->call([ProvinceSeeder::class]);
        $this->call([DistrictSeeder::class]);
        $this->call([TombonSeeder::class]);
        $this->call([CompanySeeder::class]);
        $this->call([LevelSeeder::class]);
        $this->call([PositionSeeder::class]);
        $this->call([SectionSeeder::class]);
        $this->call([DepartmentSeeder::class]);
        $this->call([TravelingSeeder::class]);
        $this->call([ShiftSeeder::class]);
        $this->call([VehicleSeeder::class]);
        $this->call([PrefixNameSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([AdministratorSeeder::class]);
        $this->call([ProfileSeeder::class]);
        $this->call([EmployeeSeeder::class]);
        Schema::enableForeignKeyConstraints();
    }
}
