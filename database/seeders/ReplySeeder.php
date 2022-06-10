<?php

namespace Database\Seeders;

use App\Models\Replies;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Replies::create([
            'reply' => 'I prefer a 6 inch myself',
            'user_id' => 3,
            'yak_id' => 1,
        ]);
        Replies::create([
            'reply' => 'The one by Liverpool central?',
            'user_id' => 2,
            'yak_id' => 1,
        ]);
        Replies::create([
            'reply' => 'Be there in 10',
            'user_id' => 2,
            'yak_id' => 2,
        ]);
        Replies::create([
            'reply' => 'Oooh youre hard',
            'user_id' => 5,
            'yak_id' => 2,
        ]);
        Replies::create([
            'reply' => 'Ye concert square be there or be square',
            'user_id' => 4,
            'yak_id' => 5,
        ]);
    }
}
