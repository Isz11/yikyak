<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Community::create([
            'name' => 'University of Liverpool',
            'latitude' => 53.4048,
            'longitude' => -2.9653,
        ]);
        Community::create([
            'name' => 'University of Chester',
            'latitude' => 53.2003,
            'longitude' => -2.8980,
        ]);
        Community::create([
            'name' => 'Wrexham Glyndwr University',
            'latitude' => 53.0526,
            'longitude' => -3.0062,
        ]);
        Community::create([
            'name' => 'University of Manchester',
            'latitude' => 53.4668,
            'longitude' => -2.2339,
        ]);
        Community::create([
            'name' => 'Oxford University',
            'latitude' => 51.7548,
            'longitude' => -1.2544,
        ]);
    }
}
