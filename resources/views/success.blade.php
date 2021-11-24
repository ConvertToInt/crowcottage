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
    <div class="column is-8">
        <h1 class="title is-size-4 underlined mt-6">Payment Successful - Thank you!</h1>

        <p class="is-size-5 mb-6 mt-3">A Confirmation Email has Been Sent to Your Email Address.</p>

        @foreach($products as $product)
            <div class="columns mt-2 mb-2 is-centered" id="product_{{$product->id}}">
                <div class="column is-3">
                    <a href="{{route('product_show', $product->title)}}">
                        <figure class="image is-4by3">
                            <img src="{{asset('storage/' . $product->img)}}" alt="Product image" class="img_shadow">
                        </figure>
                    </a>
                </div>
                <div class="column">
                    <h2 class="underlined is-size-5">{{$product->title}}</h2><br>
                    <h3 class="is-inline">£{{$product->price}} x 1</h3>
                </div>
            </div>   
        @endforeach
    </div>
</div>

@endsection