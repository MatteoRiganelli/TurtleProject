<?php

use App\Model\PrivateMessage;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Hash;

class PrivateMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $privateMessage = [
            'sender_id' => 1,
            'receiver_id' => 2,
            'subject' => 'How are you?',
            'message' => 'Hey, How are you?',
            'read' => 0
        ];

        PrivateMessage::create($privateMessage);
    }
}
