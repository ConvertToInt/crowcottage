@extends('layout')

@section('head')

<title>Crow Cottage Arts | Contact Us</title>

@endsection

@section('content')

<div class="columns is-centered m-6">
  <div class="column is-10">
      <p class="is-size-5 site-path"><a href="{{route('home')}}">Home</a> &#8594; <a href="{{route('contact_create')}}">Contact</a></p>
      <hr class="grey-8 mb-2">
  </div>
</div>

<h1 class="has-text-centered is-size-4 mb-6 px-6">Have a question? Contact us below.</h1>

<div class="columns is-centered mt-3 px-6">
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

        <div class="field is-grouped is-grouped-centered mt-6">
            <div class="control">
                <button class="button mt-3 has-text-weight-semibold mb-6 copper">Submit</button>
            </div>
          </div>
        </form>
    </div>
</div>

@endsection