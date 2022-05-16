@extends('layout')

@section('head')

<title>Crow Cottage Arts | Review Booking</title>

@endsection

@section('content')

<div class="columns is-centered mt-6 is-hidden-mobile">
    <div class="column is-8">
        <ul class="steps has-content-centered">
            <li class="steps-segment">
              <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-5">Booking Details</p>
                </div>
            </li>
            <li class="steps-segment is-active">
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

<div class="columns is-centered px-6">
    <div class="column is-7 mt-6">
        <div class="box mb-6 no_spacing">
            <h1 class="title has-text-weight-bold has-text-centered has-text-grey-darker is-size-5 mb-5 mt-2">Review Booking</h1>

            <form action="{{route('booking_payment')}}" method="post">
                @csrf

                <div class="field ">
                    <label class="label is-small">Name</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="name" value="{{$booking_details['name']}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Email</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="email" value="{{$booking_details['email']}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Phone</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="phone" value="{{$booking_details['phone']}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Class</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="class" value="{{$class->name}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Date</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="date" value="{{ \Carbon\Carbon::parse($date->date)->format('d/m/Y') }}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Time</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="time" value="{{\Carbon\Carbon::parse($class->time)->format('H:i')}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Weeks per Block</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="class" value="{{$class->weeks_per_block}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Participants</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="participants" value="{{$booking_details['participants']}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Total - £{{$class->price_per_block}} x {{$booking_details['participants']}} = £</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="total" value="{{$booking_details['total']}}" readonly>
                    </div>
                </div>

                <div class="columns has-text-centered">
                    <div class="column">
                        <button class="button mt-5 has-text-centered no_spacing mt-3 copper">
                            Proceed to Card Payment
                            <i class="fas fa-credit-card ml-2"></i>
                        </button>
                    </div>
                </div>

            </form>

            <p class="mt-5" style="font-size: 12px; word-spacing:.01em">By Making a Purchase, You Are Agreeing to the <a href="{{route('tac')}}">Terms Of Service</a></p>

        </div>
    </div>
</div>

@endsection