@extends('layout')

@section('head')

@endsection

@section('content')

{{-- <div class="columns is-centered mt-6 mb-6">
    <div class="column is-8">
        <div class="box">
            @foreach($products as $product)
                @include('snippets._product-basket')    
            @endforeach
        </div>
    </div>
</div> --}}

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
                                <input type="text" class="input is-small" name="shipping_firstname">
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Surname</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_surname">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label is-small">Company Name (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_company">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Phone Number (Preferably Mobile)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_phone">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Address</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_address">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_apartment">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">City</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_city">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Country</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="shipping_country">
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">State/Province (Optional)</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_province">
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Postal Code</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="shipping_postcode">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                      <label class="checkbox">
                        <input type="checkbox" name="billing">
                        <strong>My Billing Address Is The Same As My Shipping Address</strong>
                      </label>
                    </div>
                </div>
            </div>

                <div class="box" id="billing_details">

                    <h1 class="title has-text-weight-bold has-text-grey-darker is-size-5 mb-5 ml-3">Billing Details</h1>
                    
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label is-small">First Name</label>
                                <div class="control">
                                    <input type="text" class="input is-small" name="billing_firstname">
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label is-small">Surname</label>
                                <div class="control">
                                    <input type="text" class="input is-small" name="billing_surname">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="field">
                        <label class="label is-small">Company Name (Optional)</label>
                        <div class="control">
                            <input type="text" class="input is-small" name="billing_company">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">Phone Number (Preferably Mobile)</label>
                        <div class="control">
                            <input type="text" class="input is-small" name="billing_phone">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">Address</label>
                        <div class="control">
                            <input type="text" class="input is-small" name="billing_address">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                        <div class="control">
                            <input type="text" class="input is-small" name="billing_apartment">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">City</label>
                        <div class="control">
                            <input type="text" class="input is-small" name="billing_city">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">Country</label>
                        <div class="control">
                            <input type="text" class="input is-small" name="billing_country">
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label is-small">State/Province (Optional)</label>
                                <div class="control">
                                    <input type="text" class="input is-small" name="billing_state">
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label is-small">Postal Code</label>
                                <div class="control">
                                    <input type="text" class="input is-small" name="billing_postcode">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="button mt-5 is-primary" type="submit">Review Details</button>
            </form>
        </div>
    </div>
</div>

{{-- <div class="columns is-centered" id="billing_details">
    <div class="column is-5">
        <h1 class="title has-text-weight-bold has-text-grey-darker is-size-5 mb-5 ml-3">Billing Details</h1>
        <div class="box">
            <form method ="POST" action=>
                @csrf
            
                <h1 class="title has-text-weight-bold has-text-grey-darker is-size-5 mb-5 ml-3">Billing Details</h1>

                <div class="columns" id="billing_details">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">First Name</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_firstname">
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Surname</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_surname">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label is-small">Company Name (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_company">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Phone Number (Preferably Mobile)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_phone">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Address</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_address">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_apartment">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">City</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_city">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Country</label>
                    <div class="control">
                        <input type="text" class="input is-small" name="billing_country">
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">State/Province (Optional)</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_state">
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Postal Code</label>
                            <div class="control">
                                <input type="text" class="input is-small" name="billing_postcode">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}
  
<script type="text/javascript">
    $(document).ready(function() {
        $('input[name="billing"]').click(function() {
            if($(this).prop("checked") == true) {
                $('#billing_details').hide();
            }
            else if($(this).prop("checked") == false) {
                $('#billing_details').show();
            }
        });
    });
</script>

@endsection