@component('mail::message')

<h1>We have recieved your booking from crowcottagearts.co.uk</h1><br>

<h1>Booking information:</h1>

<p>Name: {{ $mailData['name'] }}</p>
<p>Email: {{ $mailData['email'] }}</p>
<p>Phone: {{ $mailData['phone'] }}</p>
<br><br>
<p>Class: {{ $mailData['class'] }}</p>
<p>Date: {{ $mailData['date'] }}</p>
<br><br>
<p>Participants: {{ $mailData['participants'] }}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
