<?php

namespace App;

use App\Channel;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['send_by', 'message', 'send_at', 'user_id', 'channel_id'];

    /**
     * The user that belogns to the message
    */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * The channel that belongs to the message
    */
    public function channel() {
      return $this->belongsTo(Channel::class);
    }
}
