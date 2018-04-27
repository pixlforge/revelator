@component('mail::message')
# Diagnostic | Clinique La Prairie - Revelator 
<img src="https://revelator.laprairie.ch/img/clp-logo.svg">

Hello {{ $user->first_name }} {{ $user->last_name }}.<br>
Here are the results of the diagnostic you did with Revelator :

@component('mail::button', ['url' => url('/results?name=' . $user->name)])
Results
@endcomponent

Feel free to contact if you need any further information about our programs,<br>
Best regards, 

{{ config('app.name') }}
@endcomponent
