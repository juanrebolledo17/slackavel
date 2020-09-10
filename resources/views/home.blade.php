@extends('layouts.default')

@section('content')
  <div class="flex h-full relative">
    <div class="flex h-full">
      <navbar 
        logoutroute="{{ route('logout') }}" 
        token="{{ csrf_token() }}"
      ></navbar>

      <sidebar 
        :user="{{ Auth::user() }}" 
        status="{{ session('online_status') }}"
        v-on:openmodalevent="openModal"
      ></sidebar>
    </div>
    
    <div class="w-full h-full flex flex-col bg-white">
      <channel-header></channel-header>
      <message-list :messages="messages"></message-list>
      <message-form 
        v-on:messagesend="addMessage" 
        :user="{{ Auth::user() }}"
      ></message-form>
    </div>

    <div class="w-full h-full absolute flex items-center justify-center bg-gray-900 bg-opacity-25 hidden" id="create_channel_container">
      <create-channel-modal
        v-on:closemodalevent="closeModal"
      ></create-channel-modal>
    </div>
  </div>
@endsection
