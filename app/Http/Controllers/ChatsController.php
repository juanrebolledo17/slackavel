<?php

namespace App\Http\Controllers;

use App\Message;
use App\Channel;
use App\ChannelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class ChatsController extends Controller
{
    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        $user = Auth::user();
        $currentChannelInfo = ChannelUser::where('user_id', $user->id)->orderBy('id', 'desc')->first();

        $channel = Channel::find($currentChannelInfo->channel_id);
        $messages = $channel->messages()->with('user')->get();
        return $messages;
        // return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $channel = Channel::find($request->channel_id);

        $message = Message::create([
            'user_id' => $user->id,
            'send_by' => $request->input('send_by'),
            'message' => $request->input('message'),
            'send_at' => $request->input('send_at'),
            'channel_id' => $channel->id
        ]);
        $message->save();

        broadcast(new MessageSent($user, $message, $channel))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
