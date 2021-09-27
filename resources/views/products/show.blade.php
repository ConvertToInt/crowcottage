@extends('layout')

@section('head')

@endsection

@section('content')

<div class="columns is-centered">
    <div class="column is-5">
    <p>{{$product->title}}</p>
    <p>{{$product->price}}</p>
    </div>
</div>

<div class="columns is-centered">
    <div class="column is-5">
        <div class="box">
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <form 
                role="form" 
                action="{{ route('stripe.post') }}" 
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

                <div class="field">
                    <p class="control">
                      <button class="button is-success is-fullwidth">
                        Buy Now ({{$product->price}})
                      </button>
                    </p>
                </div>

                <input type="hidden" value="{{$product->price}}" name="price"></div>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
   
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
</script>

@endsection