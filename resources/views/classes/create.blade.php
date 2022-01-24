@extends('layout')

@section('head')

@endsection

@section('content')

<h1 class="title has-text-centered has-text-weight-bold has-text-grey-darker is-size-3 pt-3 mb-6">Create a Class</h1>


<div class="columns is-centered mt-3">
    <div class="column is-half">

      <!-- Alert User -->
      @if(Session::has('success'))
        <div class="alert is-primary title has-text-weight-bold is-size-3 pt-3 mb-6">
            {{Session::get('success')}}
        </div>
      @endif
      
        <form method="post" action="{{route('class_store')}}" enctype='multipart/form-data'>
          
          @csrf

          <div class="field">
            <label class="label">Class Name</label>
            <div class="control">
              <input class="input" type="text" placeholder="Name..." name="name">
            </div>
          </div>
          
          <div class="field">
            <label class="label">Description</label>
            <div class="control">
              <textarea class="textarea" placeholder="Description..." name="desc"></textarea>
            </div>
          </div>

          <div class="field">
            <label class="label">Spaces</label>
            <div class="control">
              <input class="input" type="number" name="spaces" min="1" max="20">
            </div>
          </div>

          <div class="field">
            <label class="label">Weeks per block</label>
            <div class="control">
              <div class="select">
                <select name="weeks" required>
                  <option>1</option>
                  <option>4</option>
                </select>
                @error('subject')
                  <p class="help is-danger">{{ $errors->first('subject') }}</p>
                @enderror
              </div>
            </div>
          </div>

          <label class="label">Price Per Block</label>
          <div class="field has-addons"> 
            <div class="button is-info is-static control"><strong>£</strong></div>
            <div class="control">
              <input class="input" placeholder="Price" name="price">
            </div>
          </div>

          
          <div class="field"> 
            <label class="label">Date</label>
            <div class="control">
              <input type="date" class="select-date" name="date">
            </div>
          </div>

          <br>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-secondary">Create Class</button>
            </div>
          </div>

        </form>
    </div>
</div>

<script>

  $(document).ready(function() {
  // Initialize all input of type date
      var calendars = bulmaCalendar.attach('.select-date', {
          // type: 'datetime'
          weekStart: '1',
          disabledWeekDays: '1,2,3,4,5,6',
          showHeader: 'false',
          // disabledDates: ['12/19/2022', '12/26/2022'],
          startDate: '01/01/2022',
          endDate: '01/01/2023'
  
      });
  
      // Loop on each calendar initialized
      for(var i = 0; i < calendars.length; i++) {
          // Add listener to date:selected event
          calendars[i].on('select', date => {
              console.log(date);
          });
      }
  
      // To access to bulmaCalendar instance of an element
      var element = document.querySelector('.select-date');
      if (element) {
          // bulmaCalendar instance is available as element.bulmaCalendar
          element.bulmaCalendar.on('select', function(datepicker) {
              console.log(datepicker.data.value());
          });
      }
  });
      
  </script>

@endsection