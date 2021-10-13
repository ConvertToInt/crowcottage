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

{{-- <a href="{{route('order_add', $product->id)}}" class="button is-help">Buy now</a> --}}

{{-- <form action="{{route('order_toggle', $product->id)}}" method="POST">
    @csrf
    <button class="submit"> click
    </button>
</form> --}}

<button class="button" id="add_to_basket">  
    @if(Cookie::has('basket'))
        @if ($contains == 0)
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
                } else {
                    $('#add_to_basket').text('Remove From Basket');
                }
            },
        });
    });
</script>

@endsection