<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  @csrf

  <title>@yield('title', 'LaraBBS') - {{ setting('site_name','Laravel') }}</title>
  <meta name="description" content="@yield('description', setting('seo_description','LaraBBS'))">
  <meta name="keywords" content="@yield('keyword', setting('seo_keyword', 'LaraBBS,community'))" />
  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  @stack('style')

</head>

<body>
<div id="app" class="{{ route_class() }}-page">

  @include('layouts._header')

  <div class="container">

    @include('shared._messages')

    @yield('content')

  </div>

  @include('layouts._footer')
</div>

@if (app()->isLocal())
  @include('sudosu::user-selector')
@endif

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>

@stack('script')

</body>

</html>
