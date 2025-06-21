<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminConfig;
use Carbon\Carbon;

class AdminConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key'           => 'website_name',
                'value'         => 'AL-Farhan',
                'type'          => 0,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_logo',
                'value'         => 'frontend/images/logo.png',
                'type'          => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_primary_color',
                'value'         => '#1d1926',
                'type'          => 2,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_secondary_color',
                'value'         => '#c2c7d0',
                'type'          => 2,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'website_tertiary_color',
                'value'         => '#662c9c',
                'type'          => 2,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'sidebar_labels',
                'value'         => '#662c9c',
                'type'          => 0,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'key'           => 'dashboard_title',
                'value'         => '#662c9c',
                'type'          => 0,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        ];
        AdminConfig::insert($data);
    }
}
