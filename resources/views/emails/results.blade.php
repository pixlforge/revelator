@component('mail::message')
# The permalink to your results

Hello {{ $user->first_name }} {{ $user->last_name }}.<br>
You requested a permanent link to your results.

@component('mail::button', ['url' => url('/results?name=' . $user->name)])
Check my results
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
