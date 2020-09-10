@extends('layouts.layout-2')

@section('content')
<div class="bg-white bg-opacity-75 shadow-lg rounded border-gray-500 w-full md:w-3/4 lg:w-1/2 px-8 pt-6 pb-8 mb-4">
  <form method="post" action="{{ route('password.email') }}">
    @csrf
    <div class="mb-6">
      <label class="block text-gray-800 text-sm font-bold mb-2" for="email">
        Email address
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
      @error('email')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex items-center justify-start">
      <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Send password reset link
      </button>
    </div>
  </form>
  <p class="text-gray-800 text-md my-4 w-full font-semibold">
    If we can find an account register with your email, we'll send you a password reset link, be sure to checked out your spam folder. 
  </p>
</div>                    
@endsection

{{-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif --}}
