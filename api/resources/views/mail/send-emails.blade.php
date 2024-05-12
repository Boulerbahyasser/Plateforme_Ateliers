<x-mail::message>
# Introduction
{{$user->name}}
please click on the linck to activate your account!
<x-mail::button :url="route('verify', $user->remember_token)">
active</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
