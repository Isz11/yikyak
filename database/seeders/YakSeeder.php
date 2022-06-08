<?php

namespace Database\Seeders;

use App\Models\Yak;
use Illuminate\Database\Seeder;

class YakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Yak::create([
            'yak' => 'I just went to Subway and a nice meaty footlong',
            'user_id' => 1,
            'score' => 5,
        ]);
        Yak::create([
            'yak' => 'Meet me outside Lime Street station for a fight right now',
            'user_id' => 2,
            'score' => 11,
        ]);
        Yak::create([
            'yak' => 'Seedless red grapes are my favourite type of grapes',
            'user_id' => 3,
            'score' => 53,
        ]);
        Yak::create([
            'yak' => 'I hate dried mango',
            'user_id' => 4,
            'score' => -12,
        ]);
        Yak::create([
            'yak' => 'Anyone out tonight? Im bored',
            'user_id' => 5,
            'score' => 3,
        ]);
        Yak::create([
            'yak' => 'bumblebee is my favourite transformer',
            'user_id' => 6,
            'score' => 6,
        ]);
    }
}
