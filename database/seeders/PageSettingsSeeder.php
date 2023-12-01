<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'home',
                'created_at' => now()
            ],[
                'key' => 'about',
                'created_at' => now()
            ],[
                'key' => 'service',
                'created_at' => now()
            ],[
                'key' => 'portfolio',
                'created_at' => now()
            ],[
                'key' => 'fact',
                'created_at' => now()
            ],[
                'key' => 'testimonial',
                'created_at' => now()
            ],[
                'key' => 'brand',
                'created_at' => now()
            ],[
                'key' => 'contact',
                'created_at' => now()
            ],
        ];

        DB::table('page_settings')->insert($data);
    }
}
