@extends ('layouts.app')

@section ('content')

  @if (auth()->user())
    <App :current-user="{{ auth()->user() }}"/>
  @else
    <App/>
  @endif
@endsection