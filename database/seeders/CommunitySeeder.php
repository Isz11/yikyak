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
            'slug' => 'university-of-liverpool',
        ]);
        Community::create([
            'name' => 'University of Chester',
            'latitude' => 53.2003,
            'longitude' => -2.8980,
            'slug' => 'university-of-chester',
        ]);
        Community::create([
            'name' => 'Wrexham Glyndwr University',
            'latitude' => 53.0526,
            'longitude' => -3.0062,
            'slug' => 'wrexham-glyndwr-university',
        ]);
        Community::create([
            'name' => 'University of Manchester',
            'latitude' => 53.4668,
            'longitude' => -2.2339,
            'slug' => 'university-of-manchester',
        ]);
        Community::create([
            'name' => 'Oxford University',
            'latitude' => 51.7548,
            'longitude' => -1.2544,
            'slug' => 'oxford-university',
        ]);
        Community::create([
            'name' => 'Cambridge University',
            'latitude' => 52.2043,
            'longitude' => 0.1138,
            'slug' => 'cambridge-university',
        ]);
        Community::create([
            'name' => 'University of Sussex',
            'latitude' => 50.8591,
            'longitude' => -0.08466,
            'slug' => 'university-of-sussex',
        ]);
    }
}
