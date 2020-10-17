<?php

namespace App\Http\Controllers;

use App\User;
use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /*
     * Returns profile page of the user
     * 
     */
    public function profile() 
    {
        $user = auth()->user();
        $userChannels = Channel::where('creator_id', $user->id)->get();
        return view('profile', compact('user', 'userChannels'));
    }

    /*
     * Update user profile information
     * 
     */
    public function update(Request $request) 
    {
        $request->validate([
          'id' => 'number|required',
          'firstname' => 'string|required|max:255',
          'lastname' => 'string|required|max:255',
          'username' => 'string|required|max:255',
        ]);

        $user = User::find($request->user_id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;

        if ($request->hasFile('avatar')) {
          $path = $request->avatar->store($request->username . '/avatar/');
        }

        $user->avatar_url = $path;
        $user->save();

        return ['success' => 'updated'];
    }
}
