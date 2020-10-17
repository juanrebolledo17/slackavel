<?php

namespace App;

use App\Channel;
use App\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'username', 'avatar_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The messages that belong to the user.
     *
     */
    public function messages() {
        return $this->hasMany(Message::class);
    }

    /**
     * The channels that belong to the user.
     *
     */
    public function channels() {
        return $this->belongsToMany('App\Channel', 'channel_users');
    }

    /**
     * The channels created by the user.
     *
     */
    public function createdChannels() {
        return $this->hasMany(Channel::class);
    }
}
