@extends('layout')

@section('head')

<x-embed-styles />

<style>
    .product{
        -moz-box-shadow:    0px 0px 5px 1px #282a2d;
        -webkit-box-shadow: 0px 0px 5px 1px #282a2d;
    }

    .underlined{
        border-bottom:1px solid rgb(66, 66, 66);
    }

    .dot {
        height: 14px;
        width: 14px;
        background-color: rgb(231, 0, 0);
        border-radius: 50%;
        display: inline-block;
    }

</style>

@endsection

@section('content')

<div class="columns is-centered mt-6">
    <div class="column is-5">
        <figure class="image">
            <img class="product" src="{{asset('storage/' . $product->img)}}" alt="Product image">
        </figure>
    </div>
    <div class="column is-4">
        <p class="is-size-3 has-text-weight-semibold mb-6 underlined">
            <span>{{ Str::upper($product->title)}}</span>
            @if($product->is_sold())
                <span class="dot" style=""></span>
            @endif
        </p>
        <p class="has-text-weight-medium">{{$product->desc}}</p>
        <p class="is-size-3 has-text-weight-semibold mt-6">£{{$product->price}}</p>
    </div>
</div>
<div class="columns is-centered">
    <div class="column is-5">

    </div>
    <div class="column is-4">
        <div class="has-text-centered">
            @if($product->is_sold())
                <button class="button mt-3 is-primary is-size-4 has-text-weight-bold mb-6">SOLD</button>
            @else
                <button class="button mt-3 is-primary is-size-5 has-text-weight-semibold mb-6" id="toggle_basket" style="color:#b6875d;">  
                    @if(Cookie::has('basket'))
                        @if (!isset($key) || $key === FALSE)
                            ADD TO BASKET
                        @else
                            REMOVE FROM BASKET
                        @endif
                    @else
                        ADD TO BASKET 
                    @endif
                    <i class="fas fa-shopping-basket ml-2"></i>
                </button>
            @endif
        </div>
        <div class="mt-6" id="vidbox">
            <h1 class="title is-size-4">VIDEO TALKTHROUGH</h1>
            <x-embed url="{{$product->url}}" />
        </div>
        
    </div>
</div>

{{-- <div class="modal" id="basket">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <h1 class="title has-text-weight-bold has-text-centered has-text-grey-darker is-size-4 mb-6 mt-3">Added to Basket</h1>
            @include('snippets._product-basket', $product)    
            <a href="{{route('basket_show')}}" class="button">View Basket</a>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
  </div> --}}

<script>
    $(document).ready(function() {
        $(document.body).on("click", '#toggle_basket', function(event) {
            event.preventDefault();
            // if($('#toggle_basket').text == ("Add To Basket")){
            //     $('#toggle_basket').text("Adding To Basket")
            //     console.log('it is');
            // }
            $.ajax({
                url:'{{url("/basket/toggle/$product->id")}}',
                type:"POST",
                data:{
                    _token:('{{ csrf_token()}}'), // DECLARE AT START OF SCRIPT
                },
                success:function(response){
                    if(response == 'You have successfully removed a product'){
                        $('#toggle_basket').text('SUCCESSFULLY REMOVED');
                    }else if(response == 'You have successfully added a product') {
                        $('#toggle_basket').text('SUCCESSFULLY ADDED');
                        // $("html").addClass("is-clipped");
                        // $('#basket').addClass('is-active');
                    }
                },fail:function(response){
                    $('#toggle_basket').text('ERROR')
                }
            });
        });

        $(".modal-close").click(function() {
            $("html").removeClass("is-clipped");
            $(this).parent().removeClass("is-active");
        }); 
    });
</script>

@endsection