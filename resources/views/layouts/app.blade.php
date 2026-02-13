<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'JMS')</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- <link rel="stylesheet" href="{{ asset('style.css') }}"> -->
  <script>
    (function() {
      const nav = performance.getEntriesByType('navigation')[0];
      const type = nav && nav.type ? nav.type : '';
      const isReload = type === 'reload';

      if (isReload) {
        document.documentElement.classList.add('show-loader');
      }
    })();
  </script>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="min-h-screen bg-white text-slate-900" data-page="@yield('page', '')">
  {{-- Logo Preloader --}}
  <div id="pageLoader" class="fixed inset-0 z-[9999999] bg-white flex items-center justify-center">
    <div class="jms-loader">
      <img src="{{ asset('images/loader-ring.png') }}" alt="" class="jms-loader-ring">
      <img src="{{ asset('images/loader-inner.png') }}" alt="JMS" class="jms-loader-inner">
    </div>
  </div>

  @include('partials.header')

  <main class="@yield('mainClass', '')">
    @yield('content')
  </main>

  @if(!request()->is('admin*'))
  @include('partials.footer')
  @endif

  @if(!request()->is('admin*') && !request()->is('login*'))
  @include('partials.backtotop')
  @include('partials.whatsapp')
  @endif

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</body>

</html>