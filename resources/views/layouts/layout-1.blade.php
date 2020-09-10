
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Slackavel') }}</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <div class="h-screen flex items-center justify-center w-full flex-wrap">
      <div class="w-full md:w-1/2 lg:w-1/3 h-screen flex items-center justify-center flex-col">
        @yield('content')
      </div>
      <div class="md:w-1/2 lg:w-2/3 sm:h-screen h-20 w-full login_page_bg mt-0 sm:mt-0"></div>  
    </div>
  </div>
</body>
</html>