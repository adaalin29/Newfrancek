@component('mail::message')
# New Job request

@component('mail::panel')


Selected job: {{$message['job']}}<br>
Selected salon: {{$message['salons']}}<br>
Name: {{$message['name']}}<br>
Email: {{$message['email']}}<br>
Phone: {{$message['number']}}<br>
Message: {{$message['message']}}<br>
@if( $message['cv'] != null )
Download CV. :) 
@endif

@endcomponent

Thank you,<br>
Francek team
@endcomponent
