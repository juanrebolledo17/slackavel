<?php

namespace App;

use App\Message;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['channel_name', 'channel_description'];

    /**
     * The users that belong to the channel.
    */
    public function users() {
      return $this->belongsToMany('App\User', 'channel_users');
    }

    /**
     * The messages that belong to the channel
    */
    public function messages() {
      return $this->hasMany('App\Message');
    }
}
