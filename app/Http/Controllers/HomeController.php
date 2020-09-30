<?php

namespace App\Http\Controllers;

use App\Channel;
use App\ChannelUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = User::all();
        $user = Auth::user();
        $currentChannelInfo = ChannelUser::where('user_id','=' , $user->id)->orderBy('id', 'desc')->first();
        $channel = Channel::find($currentChannelInfo->channel_id);

        return view('home', compact('users', 'channel'));
    }
}
