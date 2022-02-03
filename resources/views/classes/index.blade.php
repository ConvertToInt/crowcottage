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

<div class="columns is-centered">
    <div class="column is-8">
        <p>{{$class->name}}</p>
        <p>{{\Carbon\Carbon::parse($class->time)->format('H:i')}}</p>
        <p>{{$class->price_per_block}}</p><br><br>

        <input type="date" class="datepicker {{$class->name_trimmed()}}">

        <h1><span id="{{$class->name_trimmed()}}-spaces"></span></h1>

        <form method="post" action="{{route('booking_review')}}" class="is-hidden" id="{{$class->name_trimmed()}}-book-form">
            @csrf
            <button type="button" id="{{$class->name_trimmed()}}-minus">-</button>
            <input type="number" id="{{$class->name_trimmed()}}-participants" value="1" min="1" name="participants">
            <button type="button" id="{{$class->name_trimmed()}}-plus">+</button>
            <button class="button" id="{{$class->name_trimmed()}}-book-btn" type="submit">Book Now</button>

            <input type="hidden" id="{{$class->name_trimmed()}}-date-id" name="date_id" value="">
            <input type="hidden" name="class_id" value="{{$class->id}}">
        </form>
    </div>
</div>

    
@endforeach

<span id="book"></span>


<script>

$(document).ready(function() {

    @foreach($classes as $class)

        var calendars = bulmaCalendar.attach('.{{$class->name_trimmed()}}', {
            weekStart: '1',
            disabledWeekDays: '1,2,3,4,5,6',
            showHeader: 'false',
            // disabledDates: ['12/19/2022', '12/26/2022'],
            highlightedDates: [@foreach ($class->dates as $date) '{{ \Carbon\Carbon::parse($date->date)->format('m/d/Y') }}', @endforeach ],
            startDate: '01/01/2022',
            endDate: '01/01/2023'

        });

        var element = document.querySelector('.{{$class->name_trimmed()}}');

        if (element) {

            element.bulmaCalendar.on('select', function(datepicker) {

                //ajax
                //send date id, and class id

                $.ajax({
                    url: "{{url("/classes/date/availability")}}",
                    type:"GET",
                    data:{
                        class_id:('{{$class->id}}'), // DECLARE AT START OF SCRIPT
                        date:(datepicker.data.value()),
                        _token:('{{ csrf_token()}}'), // DECLARE AT START OF SCRIPT
                    },
                    success:function(response){
                        if($.isEmptyObject(response)){ 
                            document.getElementById('{{$class->name_trimmed()}}-spaces').innerHTML = 'There are no classes on this day';
                            $('#{{$class->name_trimmed()}}-book-form').addClass("is-hidden");
                        } else if (response[0].spaces == 0){
                            document.getElementById('{{$class->name_trimmed()}}-spaces').innerHTML = 'This class is fully booked';
                            $('#{{$class->name_trimmed()}}-book-form').addClass("is-hidden");
                        } else {
                            document.getElementById('{{$class->name_trimmed()}}-spaces').innerHTML = 'Spaces - ' + response[0].spaces;
                            $('#{{$class->name_trimmed()}}-book-form').removeClass("is-hidden");
                            $('#{{$class->name_trimmed()}}-participants').attr('max', response[0].spaces);
                            document.getElementById("{{$class->name_trimmed()}}-date-id").value = response[0].id;

                            $('#{{$class->name_trimmed()}}-plus').click(function() {
                                var participants = $('#{{$class->name_trimmed()}}-participants').val();
                                if (participants < response[0].spaces) {
                                    var participants = parseInt($('#{{$class->name_trimmed()}}-participants').val()) + 1;
                                    $("#{{$class->name_trimmed()}}-participants").val(participants);
                                }
                            });

                            $('#{{$class->name_trimmed()}}-minus').click(function() {
                                var participants = $('#{{$class->name_trimmed()}}-participants').val();
                                if (participants > 1){
                                    var participants = parseInt($('#{{$class->name_trimmed()}}-participants').val()) - 1;
                                    $("#{{$class->name_trimmed()}}-participants").val(participants);
                                }
                            });
                        }
                    },
                });

            });
            
        }
    @endforeach
        
    
    
});
    
</script>

@endsection