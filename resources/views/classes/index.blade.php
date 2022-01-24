@extends('layout')

@section('head')

<style>
    .axis{
        background-image: url("img/projects/axis.jpg");
    }

    .absent{
        background-image: url("img/projects/absent.jpg");
    }

    .chair{
        background-image: url("img/projects/chair.jpg");
    }
</style>

@endsection

@section('content')

<div class="columns is-centered mt-6">
    <div class="column is-8">
        <h1 class="underlined is-size-3 mb-5">Classes</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique suscipit in delectus voluptatibus dolorum libero illo excepturi voluptatem, voluptates rerum hic. Architecto, rerum accusantium sint cum repellat numquam at quibusdam.</p>
        <br>
        <p>Features include:</p>
        <ul type="disc" style="color:black">
            <li>&nbsp;&nbsp;&#8226;&nbsp;blah</li>
            <li>&nbsp;&nbsp;&#8226;&nbsp;blah</li>
            <li>&nbsp;&nbsp;&#8226;&nbsp;blah</li>
        </ul>
        <br>
    </div>
</div>

@foreach ($classes as $class)

<p>{{$class->name}}</p>
<p>{{$class->price_per_block}}</p><br><br>
    
@endforeach

<form action="">
    <input type="date" class="art-bar">
</form>

<h1><span id="spaces"></span></h1>

<span id="book"></span>


<script>

$(document).ready(function() {
// Initialize all input of type date
    var calendars = bulmaCalendar.attach('.art-bar', {
        // type: 'datetime'
        weekStart: '1',
        disabledWeekDays: '1,2,3,4,5,6',
        showHeader: 'false',
        // disabledDates: ['12/19/2022', '12/26/2022'],
        highlightedDates: [@foreach ($dates as $date) '{{ \Carbon\Carbon::parse($date->date)->format('m/d/Y') }}', @endforeach ],
        startDate: '01/01/2022',
        endDate: '01/01/2023'

    });

    // Loop on each calendar initialized
    // for(var i = 0; i < calendars.length; i++) {
    //     // Add listener to date:selected event
    //     calendars[i].on('select', date => {
    //         console.log(date);
    //         
            
            
    //     });
    // }

    // To access to bulmaCalendar instance of an element
    var element = document.querySelector('.art-bar');
    if (element) {
        // bulmaCalendar instance is available as element.bulmaCalendar
        element.bulmaCalendar.on('select', function(datepicker) {
            // console.log(datepicker.data.value());
            //ajax to check spaces


            @foreach($dates as $day)
                if('{{ \Carbon\Carbon::parse($day->date)->format('m/d/Y') }}' == datepicker.data.value()){ 
                    document.getElementById('spaces').innerHTML = 'Spaces - {{$day->spaces}}';
                    document.getElementById('book').innerHTML = '';
                } else {
                    document.getElementById('spaces').innerHTML = 'There are no classes on this day';
                }

                // console.log('hey');
                    
            @endforeach
        });
    }
});
    
</script>

@endsection