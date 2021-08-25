@component('mail::message')
# New Message

@component('mail::panel')
<div style="width:100%; text-align:center; font-size:30px; font-height:bold;">
You have a new message:
</div>

Nume: {{$message['name']}}<br>
Number: {{$message['number']}}<br>
Email: {{$message['email']}}<br>
Salon : {{$message['salons']}}<br>
Message : {{$message['message']}}<br>


@endcomponent

Thanks,<br>
Francek Team.
@endcomponent
