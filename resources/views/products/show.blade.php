@extends('layout')

@section('head')

<x-embed-styles />

@endsection

@section('content')

<div class="columns is-centered">
    <div class="column is-5">
    <p>{{$product->title}}</p>
    <p>£{{$product->price}}</p>
    <x-embed url="{{$product->url}}" />
    </div>
</div>

<button class="button" id="add_to_basket">  
    @if(Cookie::has('basket'))
        @if (!isset($key) || $key === FALSE)
            Add To Basket
        @else
            Remove From Basket
        @endif
    @else
        Add to Basket 
    @endif
</button>

@if($product->is_sold())
    this item is sold!
@endif

<div class="modal" id="basket">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <h1 class="title has-text-weight-bold has-text-centered has-text-grey-darker is-size-4 mb-6 mt-3">Added to Basket</h1>
            @include('snippets._product-basket', $product)    
            <a href="{{route('basket_show')}}" class="button">View Basket</a>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
  </div>

<script>
    $("#add_to_basket").click(function(event){
        event.preventDefault();
        $.ajax({
            url:'{{url("/basket/toggle/$product->id")}}',
            type:"POST",
            data:{
                _token:('{{ csrf_token()}}'), // DECLARE AT START OF SCRIPT
            },
            success:function(response){
                if(response == 'You have successfully removed a product'){
                    $('#add_to_basket').text('Add To Basket');
                }else if(response == 'You have successfully added a product') {
                    $('#add_to_basket').text('Remove From Basket');
                    $("html").addClass("is-clipped");
                    $('#basket').addClass('is-active');
                }
            },
        });
    });

    $(".modal-close").click(function() {
        $("html").removeClass("is-clipped");
        $(this).parent().removeClass("is-active");
    });
</script>

@endsection