<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mock/MenuItem.json');
        $data = json_decode($json);

        $seq = 0;
        MenuItem::truncate();
        foreach ($data as $key) {
            $menuItem = new MenuItem();
            $menuItem->is_dash = $key->is_dash;
            $menuItem->seq = $seq++;
            $menuItem->menu_group = $key->menu_group;
            $menuItem->name = $key->name;
            $menuItem->font_icon = $key->font_icon;
            $menuItem->menu_method = $key->menu_method;
            $menuItem->route_name = $key->route_name;
            $menuItem->text_color = $key->text_color;
            $menuItem->over_hover = $key->over_hover;
            $menuItem->description = $key->description;
            $menuItem->for_admin = $key->for_admin;
            $menuItem->is_active = $key->is_active;
            $menuItem->save();
        }
    }
}
