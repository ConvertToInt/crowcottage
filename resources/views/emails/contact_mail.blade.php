@component('mail::message')

<h2>Hello CrowCottage Admin,</h2>
<p>You have recieved a new email from crowcottagearts.com</p><br>

<h1>Contact information:</h1>

<p>Name: {{ $mailData['name'] }}</p>
<p>Email: {{ $mailData['email'] }}</p>
<p>Phone: {{ $mailData['phone'] }}</p>
<p>Subject: {{ $mailData['subject'] }}</p>
<p>Message: {{ $mailData['form_message'] }}</p>

@endcomponent
