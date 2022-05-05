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
            <li class="steps-segment is-active">
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

<div class="columns is-centered mt-6 no_spacing">
    <div class="column is-5">
        <h1 class="title is-size-4 underlined">Enter Card Details</h1>
        <div class="box has-background-white-bis details_form">
            {{-- @if (Session::has('success'))
                <div class="alert alert-success has-text-centered">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif --}}

            <form 
                role="form" 
                action="{{ route('booking_purchase') }}" 
                method="post" 
                class="require-validation"
                data-cc-on-file="false"
                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                id="payment-form">

                @csrf

                <div class="field required">
                    <label class="label is-small">Name on card</label>
                    <div class="control">
                        <input type="text" class="input is-small">
                    </div>
                </div>

                <div class="field required">
                    <label class="label is-small">Card Number</label>
                    <div class="control">
                        <input type="text" class="input is-small card-number" autocomplete='off'>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-4">
                        <div class="field required">
                            <label class="label is-small">CVC</label>
                            <div class="control">
                                <input type="text" class="input is-small card-cvc" autocomplete='off' placeholder="ex. 122">
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field required">
                            <label class="label is-small">Expiration Month</label>
                            <div class="control">
                                <input type="text" class="input is-small card-expiry-month" autocomplete='off' placeholder="MM">
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field required">
                            <label class="label is-small">Expiration Year</label>
                            <div class="control">
                                <input type="text" class="input is-small card-expiry-year" autocomplete='off' placeholder="YYYY">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="error hide mb-4 has-text-danger"><p class="alert"></p></div>

                <div class="field">
                    <p class="control">
                      <button class="button is-success is-fullwidth">
                        Buy Now (£{{$total}})
                      </button>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    $(document).ready(function() {

        $(function() {
            var $form = $(".require-validation");
            
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                        inputSelector = ['input[type=text]'].join(', '),
                        $inputs = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid = true;
                    $errorMessage.addClass('hide');
            
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                    }
                });
            
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            
            });
            
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                        
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
     });

</script>

@endsection