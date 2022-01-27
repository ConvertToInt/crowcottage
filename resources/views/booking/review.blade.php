@extends('layout')

@section('head')

@endsection

@section('content')


<div class="columns is-centered">
    <div class="column is-5">
        <div class="box mb-6 no_spacing">
            <h1 class="title has-text-weight-bold has-text-centered has-text-grey-darker is-size-5 mb-5 mt-2">Booking Details</h1>

            <form action="{{route('booking_payment')}}" method="post">
                @csrf

                <div class="field ">
                    <label class="label is-small">Class</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="class" value="{{$class->name}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Date</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="date" value="{{$date->date}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Time</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="time" value="{{$class->time}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Weeks per Block</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="class" value="{{$class->weeks_per_block}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Party</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="party" value="{{$party}}" readonly>
                    </div>
                </div>

                <div class="field ">
                    <label class="label is-small">Total</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="class" value="£{{$class->price_per_block}} x {{$party}} = £{{$total}}" readonly>
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