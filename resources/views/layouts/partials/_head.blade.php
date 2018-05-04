<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }} @yield ('title')</title>

  {{--Favicon--}}
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#2b5797">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">

  {{--Facebook Open Graph--}}
  <meta property="og:image:height" content="1036">
  <meta property="og:image:width" content="1978">
  <meta property="og:description" content="Answer the questions and find the program that's best for you.">
  <meta property="og:title" content="Revelator by La Prairie ">
  <meta property="og:url" content="https://revelator.laprairie.ch/">
  <meta property="og:image" content="https://revelator.laprairie.ch/og-image.jpg">

  {{--CSRF Token--}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{--Styles--}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  @routes
</head>