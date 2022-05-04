@component('mail::message')

<h1>You have recieved a new booking from crowcottagearts.co.uk</h1><br>

<h1>Booking information:</h1>

<p>Customer Name: {{ $mailData['name'] }}</p>
<p>Customer Email: {{ $mailData['email'] }}</p>
<p>Customer Phone: {{ $mailData['phone'] }}</p>
<br><br>
<p>Class: {{ $mailData['class'] }}</p>
<p>Date: {{ $mailData['date'] }}</p>
<p>Time: {{ $mailData['start_time'] }} - {{ $mailData['end_time'] }}</p>
<br>
<p>Participants: {{ $mailData['participants'] }}</p>

@endcomponent
