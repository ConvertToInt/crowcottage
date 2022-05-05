@extends('layout')

@section('head')

@endsection

@section('content')

<div class="columns is-centered mt-6">
    <div class="column is-7">
        <ul class="steps has-content-centered">
            <li class="steps-segment">
              <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-5">Order Details</p>
                </div>
            </li>
            <li class="steps-segment">
              <span href="#" class="steps-marker"></span>
              <div class="steps-content">
                <p class="is-size-5">Review Order</p>
              </div>
            </li>
            <li class="steps-segment">
              <span class="steps-marker"></span>
              <div class="steps-content">
                <p class="is-size-5">Payment</p>
              </div>
            </li>
            <li class="steps-segment is-active">
                <span class="steps-marker"></span>
                <div class="steps-content">
                  <p class="is-size-5">Success</p>
                </div>
              </li>
        </ul>
    </div>
</div>

<div class="columns is-centered">
    <div class="column is-8 has-text-centered">
        <h1 class="title is-size-4 mt-6">Payment Successful - Thank you!</h1>

        <p class="is-size-5 mb-6 mt-3">A Confirmation Email has Been Sent to Your Email Address.</p>
    </div>
</div>

@endsection