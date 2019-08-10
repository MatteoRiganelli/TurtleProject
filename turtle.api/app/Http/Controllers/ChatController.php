<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Chat;
use Pusher\Pusher;
use Pusher\PusherException;

class ChatController extends Controller
{
    //

    public function getUserConversationById(Request $request){
        $userId = $request->input('id');

        $authUserId = $request->user()->id;

        $chats = Chat::whereIn('sender_id', [$authUserId, $userId])
            ->whereIn('receiver_id', [$authUserId, $userId])
            ->orderBy('created_at', 'desc')
            ->get();

        return response(['data' => $chats], 200);
    }

    public function saveUserChat(Request $request){

        $senderId = $request->user()->id;

        $receiverId = $request->input('receiver_id');

        $chatText = $request->input('chat');

        $data = [
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'chat' => $chatText,
            'read' => 1
        ];

        $chat = Chat::create($data);

        $finalData = Chat::where('id', $chat->id)->first();


        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );

        try{
            $pusher = new Pusher(
                '7b9c430a10bf23ed5bad',
                '95c166e98cc0042a5146',
                '652253',
                $options
            );

            $pusher->trigger('chat-channel', 'chat_saved', ['message' => $finalData]);

        }
        catch(PusherException $pusherException){echo $pusherException->getMessage();}

        return response(['data' => $finalData], 201);

    }
}
