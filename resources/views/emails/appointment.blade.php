@component('mail::message')
# New Appointment

@component('mail::panel')
<div style="width:100%; text-align:center; font-size:30px; font-height:bold;">
You have a new appointment:
</div>

Nume: {{$message['name']}}<br>
Gender : {{$message['gender']}}<br>
Email: {{$message['email']}}<br>
Number: {{$message['number']}}<br>
Service : {{$message['service']}}<br>
Salon : {{$message['salons']}}<br>
Date : {{$message['date']}}<br>
Hour : {{$message['hour']}}<br>
Message : {{$message['message']}}<br>


@endcomponent

Thanks,<br>
Francek Team.
@endcomponent
