@extends('layout')

@section('head')

@endsection

@section('content')

<h1 class="title has-text-centered has-text-weight-bold has-text-grey-darker is-size-3 pt-3 mb-6 mt-6">Want to book or have a question? Contact us below.</h1>

<div class="columns is-centered mt-3 mb-6">
    <div class="column is-half">

      <!-- Alert User -->
      @if(Session::has('success'))
        <div class="alert alert-success mb-6 is-2">
            {{Session::get('success')}}
        </div>
      @endif
      
        <form method="post" action="{{route('contact_store')}}">
          
          @csrf

          <div class="field">
            <label class="label">Full Name <span style="color:red !important">*</span></label>
            <div class="control has-icons-left">
              <input class="input @error('name') is-danger @enderror" type="text" placeholder="Your name..." name="name">
              <span class="icon is-small is-left">
                <i class="fas fa-signature"></i>
              </span>
              @error('name')
                <p class="help is-danger">{{ $errors->first('name') }}</p>
              @enderror
            </div>
          </div>

          <div class="field">
            <label class="label">Email <span style="color:red !important">*</span></label>
            <div class="control has-icons-left">
              <input class="input @error('email') is-danger @enderror" type="email" placeholder="Your Email..." name="email" required>
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
              @error('email')
                <p class="help is-danger">{{ $errors->first('email') }}</p>
              @enderror
            </div>
          </div>

          <div class="field is-expanded">
            <label class="label">Phone <span style="color:red !important">*</span></label>
            <div class="field has-addons">
              <div class="control">
                <a class="button is-static">
                  +44
                </a>
              </div>
              <div class="control">
                <input class="input @error('phone') is-danger @enderror" placeholder="Your phone number" type="tel" maxlength="10" name="phone" required>
                @error('phone')
                  <p class="help is-danger">{{ $errors->first('phone') }}</p>
                @enderror
              </div>
            </div>
          </div>
        

        <div class="field">
          <label class="label">Subject <span style="color:red !important">*</span></label>
          <div class="control">
            <div class="select @error('subject') is-danger @enderror">
              <select name="subject" required>
                <option>Select a subject</option>
                <option>Question</option>
                <option>Workshop Booking</option>
              </select>
              @error('subject')
                <p class="help is-danger">{{ $errors->first('subject') }}</p>
              @enderror
            </div>
          </div>
        </div>
  
        <div class="field">
            <label class="label">Message <span style="color:red !important">*</span></label>
            <div class="control">
            <textarea class="textarea @error('message') is-danger @enderror" placeholder="Your Message..." name="message" required></textarea>
            @error('message')
                <p class="help is-danger">{{ $errors->first('message') }}</p>
            @enderror
            </div>
        </div>

        <h1 class="title has-text-centered has-text-weight-bold has-text-grey-darker is-size-5 mb-6"><strong>Note:</strong> If you wish to make a booking make sure to mention your establishment, and who the training is for.</h1>

        <div class="field is-grouped is-grouped-centered">
            <div class="control">
                <button class="button is-secondary">Submit Enquiry</button>
            </div>
            </div>

        </form>
    </div>
</div>

@endsection