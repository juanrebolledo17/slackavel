@extends('layouts.layout-1')

@section('content')
<div class="bg-white rounded shadow-md px-8 pt-6 pb-8 mb-4 w-3/4">
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        Email
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" id="email" type="email" placeholder="Email" name="email" required value="{{ old('email') }}">
      @error('email')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-2">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" id="password" type="password" placeholder="Password" name="password" required>
      @error('password')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-6 flex">
      <label class="block text-gray-500 font-bold">
      <input class="mr-2 leading-tight bg-teal-500" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      <span class="text-sm">
        Remember me
      </span>
    </label>
    </div>

    <div class="flex items-center justify-between">
      <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Sign In
      </button>

      @if (Route::has('password.request'))
        <a class="inline-block align-baseline font-bold text-sm text-teal-500 hover:text-teal-800" href="{{ route('password.request') }}">
          Forgot Password?
        </a>
      @endif
    </div>
  </form>
  <p class="text-gray-600 text-sm mt-5 w-3/4">
    Don't have an account yet? 
    @if (Route::has('register'))
      <a class="inline-block align-baseline font-bold text-teal-500 hover:text-teal-800" href="{{ route('register') }}">
        Sign up
      </a>
    @endif
    and start being awesome.
  </p>
</div>
@endsection
