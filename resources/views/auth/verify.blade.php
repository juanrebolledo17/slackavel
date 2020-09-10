@extends('layouts.layout-2')

@section('content')
<div class="bg-white bg-opacity-75 rounded shadow-lg border-gray-500 px-8 pt-6 pb-8 mb-4 w-full md:w-3/4 lg:w-1/2 m-5 md:m-0 md:my-6 lg:my-0">
  <p class="text-gray-800 font-semibold mb-4">
    Before proceeding, please check your email for a verification link. If you did not receive the email
  </p>
  <form action="{{ route('verification.resend') }}" method="post">
    @csrf
    <div class="flex items-center justify-start">
      <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Click here to request another
      </button>
    </div>
  </form>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
