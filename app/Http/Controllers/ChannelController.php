<?php

namespace App\Http\Controllers;

use App\Channel;
use App\ChannelUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    /**
     *  Returns the current channel of the user
     *
     */
    public function currentChannel() {
        $user = Auth::user();
        $currentChannelInfo = ChannelUser::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        $currentChannel = Channel::find($currentChannelInfo->channel_id);
        return json_encode($currentChannel); 
    }

    /**
     *  Create a new channel
     *
     */
    public function createChannel(Request $request) {
        $newChannel = Channel::create([
          'channel_name' => $request->input('channel_name'),
          'channel_description' => $request->input('channel_description'),
        ]);

        $this->joinChannel($newChannel->id, $request->user_id);

        return json_encode('{ "message": "Channel created successfully" }');
    }

    /**
     *  Join user to channel
     * @param destination channel $channelId
     * @param user id $userId
     *
     */
    public function joinChannel($channelId, $userId) {
      $user = User::find($userId);
      $user->channels()->attach($channelId);
      return $user->channels()->get();
    }

    /**
     *  handle Joininig users to channels
     * @param id of the channel to join $id
     *
     */
    public function handleJoinChannel($id) {
      $user = Auth::user();
      $this->joinChannel($id, $user->id);
      return ['status' => 'successfully join channel'];
    }
}
