<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include ('layouts.partials._head')
<body>
<div id="app">
  @yield ('content')
</div>
<script>
  window.currentUser = {!! json_encode(auth()->user()) !!}
</script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
