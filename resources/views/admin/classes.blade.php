@extends('layout')

@section('head')

@endsection

@section('content')

<h1 class="is-size-4">Classes</h1><br>

@foreach ($classes as $class)
<div class="columns ml-2">
    <div class="column is-6">
        <h1><strong>Name</strong> - {{$class->name}}</h1>
        <h1><strong>Description</strong> - {{$class->desc}}</h1>
        <h1><strong>Weeks Per Block</strong> - {{$class->weeks_per_block}}</h1>
        <h1><strong>Price Per Block</strong> - £{{$class->price_per_block}}</h1>
        <h1><strong>Start Time - </strong> - {{$class->start_time}}</h1>
        <h1><strong>End Time - </strong> - {{$class->end_time}}</h1>
        <h1><strong>Spaces</strong> - {{$class->spaces}}</h1>
        <span><strong>Dates</strong> - <input type="date" class="datepicker {{$class->name_trimmed()}}"></span>
        
        <form action="{{route('class_delete', ['class'=>$class->id])}}" method="POST">
            @csrf
            @method('delete')
            <button class="has-text-danger" type="submit">Delete Class</button>
        </form>
    </div>
</div>
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
                startDate: '{{ \Carbon\Carbon::now()->format('m/d/Y') }}',
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