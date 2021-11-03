{{-- <div class="column is-4 mt-4">
    <a href="{{route('product_show', $product->title)}}">
        <div class="card" id="{{$product->title}}">
            <div class="card-image">
                <figure class="image is-square">
                    <img src="{{asset('storage/' . $product->img)}}" alt="Product image">
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-content has-text-centered">
                        <p class="has-text-weight-medium is-size-5 is-inline">{{ Str::upper($product->title)}}</p>
                        @if($product->is_sold())
                            <span class="dot" style=""></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </a>
</div> --}}

<div class="column is-4 mb-6">
    <a href="{{route('product_show', $product->title)}}">
        <figure class="image is-square">
            <img class="img_shadow" src="{{asset('storage/' . $product->img)}}" alt="Product image">
        </figure>
    </a>
    <div>
        <p class="mt-2 has-text-centered is-size-5">{{$product->title}}
        @if($product->is_sold())
            <span class="sold_dot"></span>
        @endif
        </p>
    </div>
</div>

{{-- <div class="columns is-centered mt-6">
    <div class="column is-4">
        <p class="is-size-5 has-text-weight-semibold mb-6 underlined">
            <span>{{ Str::upper($product->title)}}</span>
            @if($product->is_sold())
                <span class="dot" style=""></span>
            @endif
        </p>
    </div>
    <div class="column is-5">
        <figure class="image">
            <img class="img_shadow" src="{{asset('storage/' . $product->img)}}" alt="Product image">
        </figure>
    </div>
</div> --}}