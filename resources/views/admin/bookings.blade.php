@extends('layout')

@section('head')

<title>Crow Cottage Arts | Admin</title>

@endsection

@section('content')

<h1 class="is-size-4">Bookings</h1><br>

<form action="{{route('bookings_date')}}" method="GET" class="has-text-centered">
    @csrf
    <div class="columns is-centered">
        <div class="column is-4">
            <input type="date" class="datepicker" name="date"><br>
        </div>
        <div class="column is-1">
            <button class="button submit">
                View Bookings
            </button>
        </div>
    </div>
    
</form><br><br>

@if(isset($bookings))
    @foreach ($bookings as $booking)
    <div class="columns ml-2 underlined">
        <div class="column is-6">
            <h1><strong>Class</strong> - {{$booking->class->name}}</h1>
            <h1><strong>Name</strong> - {{$booking->name}}</h1>
            <h1><strong>Email</strong> - {{$booking->email}}</h1>
            <h1><strong>Phone</strong> - {{$booking->phone}}</h1>
            <h1><strong>Participants</strong> - {{$booking->participants}}</h1>
        </div>
    </div>

    {{ $bookings->links() }}
    @endforeach
@else

<h1 class="is-size-4 has-text-centered">There are no bookings on this day.</h1>

@endif

    

    <a href="{{route('admin_panel')}}">back</a>

    <script>
    $(document).ready(function() {

        var calendar = bulmaCalendar.attach('.datepicker', {
            weekStart: '1',
            showHeader: 'false',
            highlightedDates: [@foreach ($dates as $date) '{{ \Carbon\Carbon::parse($date->date)->format('m/d/Y') }}', @endforeach ],
            startDate: @if(isset($date)) '{{ \Carbon\Carbon::parse($date->date)->format('m/d/Y') }}' @else '{{ \Carbon\Carbon::now()->format('m/d/Y') }}' @endif,
        });
        
    });
    </script>

@endsection