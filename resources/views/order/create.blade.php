@extends('layout')

@section('head')

@endsection

@section('content')

<div class="columns is-centered">
    <div class="column is-5">
        <div class="box">
            <h1 class="title has-text-weight-bold has-text-grey-darker is-size-5 mb-5 ml-3">Shipping Details</h1>

            {{-- @if ($errors->any())
                <div class="mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="has-text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form method ="POST" action="{{route('order_review')}}">
                @csrf

                <div class="field">
                    <label class="label is-small">Email</label>
                    <div class="control">
                        <input type="text" class="input is-small @error('email') is-danger @enderror" name="email" value={{old('email')}}>
                        @error('email')  
                            <p class="help is-danger">{{ $errors->first('email') }}</p> 
                        @enderror 
                    </div>
                </div>
            
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">First Name</label>
                            <div class="control">
                                <input type="text" class="input is-small @error('shipping_firstname') is-danger @enderror" name="shipping_firstname" value={{old('shipping_firstname')}}>
                                @error('shipping_firstname')  
                                    <p class="help is-danger">{{ $errors->first('shipping_firstname') }}</p> 
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Surname</label>
                            <div class="control">
                                <input type="text" class="input is-small @error('shipping_surname') is-danger @enderror" name="shipping_surname" value={{old('shipping_surname')}}>
                                @error('shipping_surname')  
                                    <p class="help is-danger">{{ $errors->first('shipping_surname') }}</p> 
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label is-small">Company Name (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small @error('shipping_company') is-danger @enderror" name="shipping_company" value={{old('shipping_company')}}>
                        @error('shipping_company')  
                            <p class="help is-danger">{{ $errors->first('shipping_company') }}</p> 
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Phone Number (Preferably Mobile)</label>
                    <div class="control">
                        <input type="text" class="input is-small @error('shipping_phone') is-danger @enderror" name="shipping_phone" value={{old('shipping_phone')}}>
                        @error('shipping_phone')  
                            <p class="help is-danger">{{ $errors->first('shipping_phone') }}</p> 
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Address</label>
                    <div class="control">
                        <input type="text" class="input is-small @error('shipping_address') is-danger @enderror" name="shipping_address" value={{old('shipping_address')}}>
                        @error('shipping_address')  
                            <p class="help is-danger">{{ $errors->first('shipping_address') }}</p> 
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                    <div class="control">
                        <input type="text" class="input is-small @error('shipping_apartment') is-danger @enderror" name="shipping_apartment" value={{old('shipping_apartment')}}>
                        @error('shipping_apartment')  
                            <p class="help is-danger">{{ $errors->first('shipping_apartment') }}</p> 
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">City</label>
                    <div class="control">
                        <input type="text" class="input is-small @error('shipping_city') is-danger @enderror" name="shipping_city" value={{old('shipping_city')}}>
                        @error('shipping_city')  
                            <p class="help is-danger">{{ $errors->first('shipping_city') }}</p> 
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label is-small">Country</label>
                    <div class="control">
                        <input type="text" class="input is-small @error('shipping_country') is-danger @enderror" name="shipping_country" value={{old('shipping_country')}}>
                        @error('shipping_country')  
                            <p class="help is-danger">{{ $errors->first('shipping_country') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">State/Province (Optional)</label>
                            <div class="control">
                                <input type="text" class="input is-small @error('shipping_province') is-danger @enderror" name="shipping_province" value={{old('shipping_province')}}>
                                @error('shipping_province')  
                                    <p class="help is-danger">{{ $errors->first('shipping_province') }}</p> 
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label is-small">Postal Code</label>
                            <div class="control">
                                <input type="text" class="input is-small @error('shipping_postcode') is-danger @enderror" name="shipping_postcode" value={{old('shipping_postcode')}}>
                                @error('shipping_postcode')  
                                    <p class="help is-danger">{{ $errors->first('shipping_postcode') }}</p> 
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                      <label class="checkbox">
                        <input type="checkbox" name="billing" checked>
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
                                    <input type="text" class="input is-small @error('billing_firstname') is-danger @enderror" name="billing_firstname" value={{old('billing_firstname')}}>
                                    @error('billing_firstname')  
                                        <p class="help is-danger">{{ $errors->first('billing_firstname') }}</p> 
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label is-small">Surname</label>
                                <div class="control">
                                    <input type="text" class="input is-small @error('billing_surname') is-danger @enderror" name="billing_surname" value={{old('billing_surname')}}>
                                    @error('billing_surname')  
                                        <p class="help is-danger">{{ $errors->first('billing_surname') }}</p> 
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="field">
                        <label class="label is-small">Company Name (Optional)</label>
                        <div class="control">
                            <input type="text" class="input is-small @error('billing_company') is-danger @enderror" name="billing_company" value={{old('billing_company')}}>
                            @error('billing_company')  
                                <p class="help is-danger">{{ $errors->first('billing_company') }}</p> 
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">Phone Number (Preferably Mobile)</label>
                        <div class="control">
                            <input type="text" class="input is-small @error('billing_phone') is-danger @enderror" name="billing_phone" value={{old('billing_phone')}}>
                            @error('billing_phone')  
                                <p class="help is-danger">{{ $errors->first('billing_phone') }}</p> 
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">Address</label>
                        <div class="control">
                            <input type="text" class="input is-small @error('billing_address') is-danger @enderror" name="billing_address" value={{old('billing_address')}}>
                            @error('billing_address')  
                                <p class="help is-danger">{{ $errors->first('billing_address') }}</p> 
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">Apartment/Suite/Building (Optional)</label>
                        <div class="control">
                            <input type="text" class="input is-small @error('billing_apartment') is-danger @enderror" name="billing_apartment" value={{old('billing_apartment')}}>
                            @error('billing_apartment')  
                                <p class="help is-danger">{{ $errors->first('billing_apartment') }}</p> 
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">City</label>
                        <div class="control">
                            <input type="text" class="input is-small @error('billing_city') is-danger @enderror" name="billing_city" value={{old('billing_city')}}>
                            @error('billing_city')  
                                <p class="help is-danger">{{ $errors->first('billing_city') }}</p> 
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label is-small">Country</label>
                        <div class="control">
                            <input type="text" class="input is-small @error('billing_country') is-danger @enderror" name="billing_country" value={{old('billing_country')}}>
                            @error('billing_country')  
                                <p class="help is-danger">{{ $errors->first('billing_country') }}</p> 
                            @enderror
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label is-small">State/Province (Optional)</label>
                                <div class="control">
                                    <input type="text" class="input is-small @error('billing_state') is-danger @enderror" name="billing_state" value={{old('billing_state')}}>
                                    @error('billing_state')  
                                        <p class="help is-danger">{{ $errors->first('billing_state') }}</p> 
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label class="label is-small">Postal Code</label>
                                <div class="control">
                                    <input type="text" class="input is-small @error('billing_postcode') is-danger @enderror" name="billing_postcode" value={{old('billing_postcode')}}>
                                    @error('billing_postcode')  
                                        <p class="help is-danger">{{ $errors->first('billing_postcode') }}</p> 
                                    @enderror
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
  
<script type="text/javascript">
    $(document).ready(function() {

        $('#billing_details').hide();

        $('input[name="billing"]').change(function() {
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