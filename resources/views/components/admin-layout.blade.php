<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>{{ $title ?? 'Dashboard' }}</title>
  </head>
  <body>
      <!-- Side navigation -->
      <div class="sidenav h-100 position-fixed bg-light overflow-hidden pt-3">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('news.index') }}">News</a>
    </div>

    {{ $slot }}

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>