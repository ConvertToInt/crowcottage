@extends('layout')

@section('head')

<title>Crow Cottage Arts | Basket</title>

@endsection

@section('content')

@if (session('status'))
    <div class="has-text-centered mt-6">
        <h1 class="is-danger is-size-5">{{ session('status') }}</h1>
    </div>
@endif

<div class="columns is-centered m-6">
    <div class="column is-10">
        <p class="is-size-5 site-path"><a href="{{route('home')}}">Home</a> &#8594; <a href="{{route('basket_show')}}">Basket</a></p>
        <hr class="grey-8 mb-2">
    </div>
  </div>

<div class="columns is-centered mt-6 mb-6 px-6 pb-6"> 
    <div class="column is-8">
        <div class="ml-5 mr-5 no_spacing">
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