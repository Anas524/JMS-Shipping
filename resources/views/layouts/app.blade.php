<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'JMS')</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-slate-900">
  @include('partials.header')

  <main class="@yield('mainClass', 'pt-20')">
    @yield('content')
  </main>

  @include('partials.footer')
  @include('partials.whatsapp')
</body>
</html>
