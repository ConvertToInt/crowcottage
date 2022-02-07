@extends('layout')

@section('head')

@endsection

@section('content')

<h1>Classes</h1><br>

@foreach ($classes as $class)
    {{$class->name}} <br>
    {{$class->spaces}} Spaces <br>
    <span>Dates - </span>
    <input type="date" class="datepicker {{$class->name_trimmed()}}">
    
    <form action="{{route('class_delete', ['class'=>$class->id])}}" method="POST">
        @csrf
        @method('delete')
        <br><button type="submit">Remove Class</button><br>
    </form>
@endforeach

<a href="{{route('class_create')}}">Add Class</a><br>

<a href="{{route('admin_panel')}}">back</a>

<script>

    $(document).ready(function() {
    
        @foreach($classes as $class)
            var calendars = bulmaCalendar.attach('.{{$class->name_trimmed()}}', {
                weekStart: '1',
                showHeader: 'false',
                highlightedDates: [@foreach ($class->dates as $date) '{{ \Carbon\Carbon::parse($date->date)->format('m/d/Y') }}', @endforeach ],
                startDate: '01/01/2022',
                endDate: '01/01/2023'
            });
        
    
            var element = document.querySelector('.{{$class->name_trimmed()}}');

            if (element) {
                element.bulmaCalendar.on('select', function(datepicker) {
                    console.log(datepicker.data.value());

                    $.ajax({
                        url: "{{url("/admin/classes/date/toggle")}}",
                        type:"POST",
                        data:{
                            date:(datepicker.data.value()),
                            class_id:('{{$class->id}}'),
                            _token:('{{ csrf_token()}}'),
                        },
                        success:function(response){
                            location.reload(true);
                        },
                    });
                });
            }
        @endforeach
    });
        
    </script>

@endsection