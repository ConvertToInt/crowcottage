<div class="column is-4 mt-4">
    <a href="{{route('product_show', $product->title)}}">
        <div class="card hoverable" id="{{$product->title}}">
            <div class="card-image">
                <figure class="image is-4by3">
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
</div>