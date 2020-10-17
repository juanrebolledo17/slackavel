@extends('layouts.default')

@section('title')
  | {{ $user->username }}'s profile
@endsection

@section('content')
  <div class="w-full h-screen grid grid-cols-profile">
    <div class="col-start-1 col-end-2 h-full">
      <profile-sidebar @change-tab-event="changeTab" />
    </div>
    <div class="col-start-2 col-end-4">
      <div class="shadow-lg rounded-lg my-6 mx-8 p-8">
        <template v-if="profileTab === 'account'">
          <account :user="{{ Auth::user() }}" />
        </template>

        <template v-if="profileTab === 'channels'">

          <channels 
            :user="{{ Auth::user() }}"
            :channels="{{ $userChannels }}"
          />
        </template>
      </div>
    </div>
  </div>
@endsection