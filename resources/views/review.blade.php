@extends('layout')

@section('head')

@endsection

@section('content')

<h1 class="title has-text-weight-bold has-text-grey-darker is-size-5 mb-5 ml-3">Review Order</h1>

<div class="columns is-centered mt-6 mb-6">
    <div class="column is-5">
        <div class="box">
            @foreach($products as $product)
                @include('snippets._product-basket')    
            @endforeach
        </div>
    </div>
</div>

<div class="columns is-centered">
    <div class="column is-5">
        <div class="box">
            <h1 class="title has-text-weight-bold has-text-grey-darker is-size-5 mb-5 ml-3">Shipping Details</h1>

            <form method ="POST" action="{{route('order_review')}}">
                @csrf
            
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">First Name</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_firstname" value="{{$request->shipping_firstname}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Surname</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_surname" value="{{$request->shipping_surname}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label is-small">Company Name (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_company" value="{{$request->shipping_company}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Phone Number (Preferably Mobile)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_phone" value="{{$request->shipping_phone}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Address</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_address" value="{{$request->shipping_address}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_apartment" value="{{$request->shipping_apartment}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">City</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_city" value="{{$request->shipping_city}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Country</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_country" value="{{$request->shipping_country}}" disabled>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">State/Province (Optional)</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_province" value="{{$request->shipping_province}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Postal Code</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_postcode" value="{{$request->shipping_postcode}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                @if($request->billing == 'on')
                <div class="field">
                    <div class="control">
                      <label class="checkbox">
                        <input type="checkbox" name="billing" disabled checked>
                        <strong>My Billing Address Is The Same As My Shipping Address</strong>
                      </label>
                    </div>
                </div>
                @else
                <h1 class="title has-text-weight-bold has-text-grey-darker is-size-5 mb-5 ml-3">Billing Details</h1>
                    
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">First Name</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_firstname" value="{{$request->billing_firstname}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Surname</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_surname" value="{{$request->billing_surname}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label is-small">Company Name (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_company" value="{{$request->billing_company}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Phone Number (Preferably Mobile)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_phone" value="{{$request->billing_phone}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Address</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_address" value="{{$request->billing_address}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_apartment" value="{{$request->billing_apartment}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">City</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_city" value="{{$request->billing_city}}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Country</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_country" value="{{$request->billing_country}}" disabled>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">State/Province (Optional)</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_state" value="{{$request->billing_state}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Postal Code</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_postcode" value="{{$request->billing_postcode}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </form>

            <a href="{{route('order_payment')}}" class="button mt-6">Proceed to Card Payment</a>
        </div>
    </div>
</div>


@endsection