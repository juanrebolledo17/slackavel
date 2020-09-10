@extends('layouts.layout-2')

@section('content')
<div class="bg-white bg-opacity-75 rounded shadow-lg border-gray-500 px-8 pt-6 pb-8 mb-4 w-full md:w-3/4 lg:w-1/2 m-5 md:m-0 md:my-6 lg:my-0">
  <form method="post" action="{{ route('register') }}">
    @csrf
    <div class="flex mb-4 flex-wrap">
      <div class="w-full lg:flex-1 lg:mr-4 mb-4 lg:mb-0">
        <label class="block text-gray-800 text-sm font-bold mb-2" for="firstname">
          Firstname
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('firstname') border-red-500 @enderror" id="firstname" type="text" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}" required>
        @error('firstname')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="w-full lg:flex-1">
        <label class="block text-gray-800 text-sm font-bold mb-2" for="lastname">
          Lastname
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('lastname') border-red-500 @enderror" id="lastname" type="text" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}" required>
        @error('lastname')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror" id="username" type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
      @error('username')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label class="block text-gray-800 text-sm font-bold mb-2" for="email">
        Email
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
      @error('email')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>
    <div class="flex mb-6 flex-wrap">
      <div class="w-full lg:flex-1 lg:mr-4 mb-4 lg:mb-0">
        <label class="block text-gray-800 text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" id="password" type="password" placeholder="Password" name="password" required>
        @error('password')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="w-full lg:flex-1">
        <label class="block text-gray-800 text-sm font-bold mb-2" for="password-confirm">
          Confirm password
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password_confirmation') border-red-500 @enderror" id="password-confirm" type="password" placeholder="Confirm password" name="password_confirmation" required>
        @error('password_confirmation')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex items-center justify-start">
      <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Sign Up
      </button>
    </div>
  </form>
  <p class="text-gray-800 text-sm mt-5 w-3/4">
    Already have an account? 
    @if (Route::has('login'))
      <a class="inline-block align-baseline font-bold text-teal-500 hover:text-teal-800" href="{{ route('login') }}">
        Sign in
      </a>
    @endif
    and let's get down to business.
  </p>
</div>
@endsection
