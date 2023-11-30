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
                'created_at' => now(),
            ],[
                'key' => 'site_logo',
                'created_at' => now(),
            ],[
                'key' => 'footer_text',
                'created_at' => now(),
            ]
        ];
        SiteSetting::insert($data);
    }
}
