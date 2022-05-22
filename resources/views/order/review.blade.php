@extends('layout')

@section('head')

<title>Crow Cottage Arts | Review Order</title>

@endsection

@section('content')

<div class="columns is-centered mt-6 is-hidden-mobile">
    <div class="column is-8">
        <ul class="steps has-content-centered">
            <li class="steps-segment is-completed">
              <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-5">Order Details</p>
                </div>
            </li>
            <li class="steps-segment is-active">
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
            <li class="steps-segment">
                <span class="steps-marker"></span>
                <div class="steps-content">
                  <p class="is-size-5">Success</p>
                </div>
              </li>
        </ul>
    </div>
</div>

<div class="columns is-centered mt-6 mb-6 px-5">
    <div class="column is-7">
        <div class="no_spacing">
            @foreach($products as $product)
                @include('snippets._product-basket')    
            @endforeach
        </div>
    </div>
</div>

<div class="columns is-centered px-5">
    <div class="column is-7">
        <div class="box mb-6 no_spacing">
            <h1 class="title has-text-weight-bold has-text-centered has-text-grey-darker is-size-5 mb-5 mt-2">Shipping Details</h1>

            <form method="POST" action="{{route('order_payment')}}">
                @csrf

                <div class="field ">
                    <label class="label is-small">Email</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="email" value="{{$order_details['email']}}" readonly>
                    </div>
                </div>
            
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">First Name</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_firstname" value="{{$order_details['shipping_firstname']}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Surname</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_surname" value="{{$order_details['shipping_surname']}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label is-small">Company Name (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_company" value="{{$order_details['shipping_company']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Phone Number (Preferably Mobile)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_phone" value="{{$order_details['shipping_phone']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Address</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_address" value="{{$order_details['shipping_address']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_apartment" value="{{$order_details['shipping_apartment']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">City</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_city" value="{{$order_details['shipping_city']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Country</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_country" value="{{$order_details['shipping_country']}}" readonly>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">State/Province (Optional)</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_province" value="{{$order_details['shipping_province']}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Postal Code</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_postcode" value="{{$order_details['shipping_postcode']}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                @isset($order_details['same_as_billing'])
                <div class="field mb-6">
                    <div class="control">
                      <label class="checkbox">
                        <input type="checkbox" name="billing" disabled checked>
                        My Billing Address Is The Same As My Shipping Address
                      </label>
                    </div>
                </div>
                @else
                <h1 class="title has-text-weight-bold has-text-grey-darker has-text-centered is-size-5 mb-6 mt-6">Billing Details</h1>
                    
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">First Name</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_firstname" value="{{$order_details['billing_firstname']}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Surname</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_surname" value="{{$order_details['billing_surname']}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label is-small">Company Name (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_company" value="{{$order_details['billing_company']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Phone Number (Preferably Mobile)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_phone" value="{{$order_details['billing_phone']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Address</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_address" value="{{$order_details['billing_address']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_apartment" value="{{$order_details['billing_apartment']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">City</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_city" value="{{$order_details['billing_city']}}" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Country</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_country" value="{{$order_details['billing_country']}}" readonly>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">State/Province (Optional)</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_province" value="{{$order_details['billing_province']}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Postal Code</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_postcode" value="{{$order_details['billing_postcode']}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                @endisset
            </form>

            <form method="POST" action="{{route('order_payment')}}" id="select_delivery">
                @csrf

                <h1 class="title has-text-weight-bold has-text-centered has-text-grey-darker is-size-4 mb-6 mt-6">Delivery</h1>

                <p><strong>Note:</strong> Delivery may not be possible depending on your order or location</p>

                <div class="control mb-4 mt-4">
                    <label class="radio">
                        <input type="radio" name="delivery_method" checked="true" value="Collect from store">
                        Collect from Store (Free)
                    </label><br>
                    <label class="radio">
                        <input type="radio" name="delivery_method" value="Arrange delivery">
                        Arrange Delivery (Delivery Fees Apply)
                    </label>
                </div>

                <span class="error_msg is-danger"></span>

                <div class="columns has-text-centered">
                    <div class="column">
                        <button class="button mt-5 has-text-centered no_spacing mt-3 copper">
                            Proceed to Card Payment
                            <i class="fas fa-credit-card ml-2"></i>
                        </button>
                    </div>
                </div>
            </form>

            <p class="mt-5" style="font-size: 12px; word-spacing:.01em">By Making a Purchase, You Are Agreeing to the <a href="{{route('tac')}}">Terms Of Service</a></p>
        </div>
    </div>
</div>

@endsection