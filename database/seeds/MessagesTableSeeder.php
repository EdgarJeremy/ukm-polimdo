<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Message::class, 50)->create();
        //
        // for($i = 0; $i <= 50; $i++) {
        //     Message::create([
        //         "name" => str_random(10),
        //         "nim" => rand(11111111, 99999999),
        //         "email" => str_random(5)."@gmail.com",
        //         "phone" => rand(11111111, 99999999),
        //         "message" => str_random(50),
        //         "ukm_id" => 2
        //     ]);
        // }
    }
}
