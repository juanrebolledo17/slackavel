@extends('layouts.layout-2')

@section('content')
<div class="bg-white bg-opacity-75 shadow-lg rounded border-gray-500 w-full md:w-3/4 lg:w-1/2 px-8 pt-6 pb-8 mb-4">
  <p class="text-gray-800 font-semibold mb-4">
    Please confirm your password before continuing.
  </p>
  <form action="" method="post">
    @csrf

    <div class="mb-4">
      <label class="block text-gray-800 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" id="password" type="password" placeholder="Password" name="password" required>
      @error('password')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block text-gray-800 text-sm font-bold mb-2" for="password-confirm">
        Confirm password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password_confirmation') border-red-500 @enderror" id="password-confirm" type="password" placeholder="Confirm password" name="password_confirmation" required>
      @error('password_confirmation')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex items-center justify-between">
      <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Confirm password
      </button>

      @if (Route::has('password.request'))
        <a class="inline-block align-baseline font-bold text-sm text-teal-500 hover:text-teal-800" href="{{ route('password.request') }}">
          Forgot Password?
        </a>
      @endif
    </div>
  </form>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
