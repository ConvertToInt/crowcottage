@extends('layout')

@section('head')

<style>

</style>

@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success has-text-centered">
        {{ session('status') }}
    </div>
@endif

<div class="columns is-centered mt-6 mb-6"> 
    <div class="column is-8">
        <h1 class="title is-size-4 underlined">Review Basket</h1>
        <div class="box has-background-white-bis no_spacing">
        @if(@isset($products))
            @foreach($products as $product)
                @include('snippets._product-basket')    
            @endforeach
            <h2 class="has-text-right"><strong>Total Price: £<span id="total_price">{{$total}}</span></strong></h2>
            </div>
            <a href="{{route('order_create')}}" class="button has-text-centered no_spacing mt-3 copper">
                Proceed to Checkout
                <i class="fas fa-lock ml-2"></i>
            </a>
        @else
            <h1> There are no items in your basket!</h1>
        </div>
        @endif
    </div>
</div>


<script>
    $(document).ready(function() { 

        $(document.body).on("click", '.remove_product', function(event){
            event.preventDefault();
            id = (this.id);

            $.ajax({
                url:'/basket/remove/' + id,
                type:"GET",
                success:function(response){
                    if(response == 'You have successfully removed a product'){
                        $.ajax({
                            url:'{{url("/basket/total")}}',
                            type:"GET",
                            success:function(response){
                                // setTimeout(donothing,5000);
                                $('#product_' + id).text('Removed from Basket');
                                $('#total_price').text(response);
                            }
                        });
                    }
                }
            });
        });
    });
</script>

@endsection