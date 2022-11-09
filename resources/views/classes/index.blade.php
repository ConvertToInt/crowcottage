@extends('layout')

@section('head')

<title>Crow Cottage Arts | Classes</title>

@endsection

@section('content')

<div class="columns is-centered m-6">
    <div class="column is-10">
        <p class="is-size-5 site-path"><a href="{{route('home')}}">Home</a> &#8594; <a href="{{route('classes')}}">Classes</a></p>
        <hr class="grey-8 mb-2">
    </div>
  </div>

<div class="columns is-centered px-5 mb-6">
    <div class="column is-8">
        <p class="has-text-justified is-size-5 has-text-weight-light">Have fun and be creative while learning how to make your own fused glass panel</p>
    </div>
</div>

@if($errors->any())
    <h1 class="has-text-centered has-text-danger is-size-3 mb-4">{{$errors->first()}}</h1>
@endif

@foreach ($classes as $class)

<div class="columns is-centered px-5 mt-3">
    <div class="column is-8 mb-6" style="border:2px solid #aaaaaa;">
        <div class="columns">
            <div class="column is-6" style="border-right:2px solid #aaaaaa;">
                <h1 class="is-size-4 mb-4 underlined">{{$class->name}}</h1>
                <p class="is-size-5 mb-5 has-text-justified has-text-weight-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita neque autem sed iusto, labore voluptatem explicabo aspernatur est numquam ab.</p>
                <p>Time - {{\Carbon\Carbon::parse($class->start_time)->format('H:i')}} - {{\Carbon\Carbon::parse($class->end_time)->format('H:i')}}</p>
                <p>{{$class->weeks_per_block}} Week(s) Per Block</p>
                <p>£{{$class->price_per_block}} Per Block</p>
            </div>
            <div class="column">
                <input type="date" class="datepicker {{$class->name_trimmed()}}">
                        <h1 class="mt-5 mb-6 is-size-4 has-text-centered"><span id="{{$class->name_trimmed()}}-availability"></span></h1>
                        <form method="post" action="{{route('booking_create')}}" class="is-hidden" id="{{$class->name_trimmed()}}-book-form">
                            @csrf
                            <div class="columns has-text-centered">
                                <div class="column" style="border-right:1px solid #aaaaaa;">
                                    <button type="button" id="{{$class->name_trimmed()}}-minus"><i class="fa fa-minus"></i></button>
                                    <input type="number" id="{{$class->name_trimmed()}}-participants" value="1" min="1" name="participants">
                                    <button type="button" id="{{$class->name_trimmed()}}-plus"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="column">
                                    <button class="button" id="{{$class->name_trimmed()}}-book-btn" type="submit">Book Now</button>
                                </div>
                            </div>
                
                            <input type="hidden" id="{{$class->name_trimmed()}}-date-id" name="date_id" value="">
                            <input type="hidden" name="class_id" value="{{$class->id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
            startDate: '{{ \Carbon\Carbon::now()->format('m/d/Y') }}',
        });

        var element = document.querySelector('.{{$class->name_trimmed()}}');

        if (element) {

            element.bulmaCalendar.on('select', function(datepicker) {
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
                            document.getElementById('{{$class->name_trimmed()}}-availability').innerHTML = 'There are no classes on this day';
                            $('#{{$class->name_trimmed()}}-book-form').addClass("is-hidden");
                        } else if (response.availability == 0){
                            document.getElementById('{{$class->name_trimmed()}}-availability').innerHTML = 'This class is fully booked';
                            $('#{{$class->name_trimmed()}}-book-form').addClass("is-hidden");
                        } else {
                            document.getElementById('{{$class->name_trimmed()}}-availability').innerHTML = response.availability + ' Spaces Remaining';
                            $('#{{$class->name_trimmed()}}-book-form').removeClass("is-hidden");
                            $('#{{$class->name_trimmed()}}-participants').attr('max', response.availability);
                            document.getElementById("{{$class->name_trimmed()}}-date-id").value = response.id;

                            $('#{{$class->name_trimmed()}}-plus').click(function() {
                                var participants = $('#{{$class->name_trimmed()}}-participants').val();
                                if (participants < response.availability) {
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