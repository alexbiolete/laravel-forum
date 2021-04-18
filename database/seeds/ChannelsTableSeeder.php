<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel_1 = ['title' => 'Laravel', 'slug' => 'laravel'];
        $channel_2 = ['title' => 'Express.js', 'slug' => 'express-js'];
        $channel_3 = ['title' => 'Node.js', 'slug' => 'node-js'];
        $channel_4 = ['title' => 'Vue.js', 'slug' => 'vue-js'];
        $channel_5 = ['title' => 'React.js', 'slug' => 'react-js'];
        
        Channel::create($channel_1);
        Channel::create($channel_2);
        Channel::create($channel_3);
        Channel::create($channel_4);
        Channel::create($channel_5);
    }
}
