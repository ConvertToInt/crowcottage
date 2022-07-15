@component('mail::message')

<h1>You have recieved a new booking from crowcottagearts.com</h1><br>

<h1>Booking information:</h1>

<p>Customer Name: {{ $mailData['name'] }}</p>
<p>Customer Email: {{ $mailData['email'] }}</p>
<p>Customer Phone: {{ $mailData['phone'] }}</p>
<p>Participants: {{ $mailData['participants'] }}</p>
<p>Class: {{ $mailData['class'] }}</p>
<br><br>
<h1>Dates:</h1>
<ul>
    @foreach($mailData['dates'] as $date)
        <li><h2>{{ $date->format('d/m/Y') }} &nbsp; {{ $mailData['start_time'] }} - {{ $mailData['end_time'] }}</h2></li>
    @endforeach
</ul>
<br>

@endcomponent
