@extends('layout')

@section('head')

@endsection

@section('content')

<div class="columns is-centered">
    <div class="column is-8">
        <h1 class="title is-size-4 underlined mt-6">Booking Successful - Thank you!</h1>

        <p class="is-size-5 mb-6 mt-3">A Confirmation Email has Been Sent to Your Email Address.</p>

        <p>{{$class->name}}</p>
        <p>{{\Carbon\Carbon::parse($date->date)->format('d/m/Y')}}</p>
        <p>{{$class->time}}</p>
    </div>
</div>


@endsection