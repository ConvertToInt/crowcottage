@extends('layout')

@section('head')

<title>Crow Cottage Arts | Make Booking</title>

@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="columns is-centered mt-6 is-hidden-mobile">
    <div class="column is-8">
        <ul class="steps has-content-centered">
            <li class="steps-segment is-active">
              <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-5">Booking Details</p>
                </div>
            </li>
            <li class="steps-segment">
              <span href="#" class="steps-marker"></span>
              <div class="steps-content">
                <p class="is-size-5">Review Booking</p>
              </div>
            </li>
            <li class="steps-segment">
              <span class="steps-marker"></span>
              <div class="steps-content">
                <p class="is-size-5">Payment</p>
              </div>
            </li>
            <li class="steps-segment">
                <span class="steps-marker"></span>
                <div class="steps-content">
                  <p class="is-size-5">Success</p>
                </div>
              </li>
        </ul>
    </div>
</div>

<div class="columns is-centered px-5">
    <div class="column is-7 mt-6">
        <div class="box mb-6 no_spacing">
            <h1 class="title has-text-weight-bold has-text-centered has-text-grey-darker is-size-5 mb-5 mt-2">Booking Details</h1>

            <form action="{{route('booking_review')}}" method="post">
                @csrf

                <div class="field ">
                    <label class="label is-small">Name</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="name">
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Email</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="email">
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Phone</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="phone">
                    </div>
                </div>

                <div class="columns has-text-centered">
                    <div class="column">
                        <button class="button mt-5 has-text-centered no_spacing mt-3 copper">
                            Review Booking Details
                        </button>
                    </div>
                </div>

            </form>

            <p class="mt-5" style="font-size: 12px; word-spacing:.01em">By Making a Purchase, You Are Agreeing to the <a href="{{route('tac')}}">Terms Of Service</a></p>

        </div>
    </div>
</div>

@endsection