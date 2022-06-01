@component('mail::message')

<h1>We have recieved your booking from crowcottagearts.co.uk</h1><br>

<h1>Booking information:</h1>

<p>Name: {{ $mailData['name'] }}</p>
<p>Email: {{ $mailData['email'] }}</p>
<p>Phone: {{ $mailData['phone'] }}</p>
<p>Class: {{ $mailData['class'] }}</p>
<p>Participants: {{ $mailData['participants'] }}</p>
<br><br>
<h1>Dates:</h1>
<ul>
    @foreach($mailData['dates'] as $date)
        <li><h2>{{ $date->format('d/m/Y') }} &nbsp; {{ $mailData['start_time'] }} - {{ $mailData['end_time'] }}</h2></li>
    @endforeach
</ul>
<br>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
