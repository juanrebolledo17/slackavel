<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
  return redirect()->route('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('messages', 'ChatsController@fetchMessages');

Route::post('messages', 'ChatsController@sendMessage');

Route::get('currentChannel', 'ChannelController@currentChannel');

Route::post('createChannel', 'ChannelController@createChannel');

// Route::get('joinChannel/{id}', 'ChannelController@handleJoinChannel');

Route::get('joinChannel/{channelId}/{userId}', 'ChannelController@joinChannel');

// Route::get('/welcome', function () {
//   return view('welcome');
// })->name('welcome');

// Route::get('/test', function (Request $request) {
//   return $request->user();
// });