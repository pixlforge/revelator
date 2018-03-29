@component('mail::message')
# Your permalink to your results

Hello, {{ $user->first_name }} {{ $user->last_name }}.<br>
You requested that we send you a permanent link to your results so you can check them at any given time, so here you go:

@component('mail::button', ['url' => url('/results?name=' . $user->name)])
Results
@endcomponent

Thank you for your trust,<br>
{{ config('app.name') }}
@endcomponent
