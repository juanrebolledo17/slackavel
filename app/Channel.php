<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['channel_name', 'channel_description'];

    /**
     * The users that belong to the channel.
    */
    public function users() {
      return $this->belongsToMany('App\User');
    }
}
