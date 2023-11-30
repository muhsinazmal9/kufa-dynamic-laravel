<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'site_title',
            ],[
                'key' => 'site_logo',
            ],[
                'key' => 'footer_text',
            ]
        ];
        SiteSetting::insert($data);
    }
}
