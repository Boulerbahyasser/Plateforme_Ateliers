<x-mail::message>
# Introduction
    hi please if you wan to reset your password <br>
    click on the link bellow:
<x-mail::button :url="'http://localhost:8080/changepassword/' . $data['token']">
click here to reset your password
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
