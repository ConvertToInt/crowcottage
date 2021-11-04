<div class="columns mt-2 mb-2 is-centered" id="product_{{$product->id}}">
    <div class="column is-3">
        <a href="{{route('product_show', $product->title)}}">
            <figure class="image is-4by3">
                <img src="{{asset('storage/' . $product->img)}}" alt="Product image" class="img_shadow">
            </figure>
        </a>
    </div>
    <div class="column">
        <h2 class="underlined is-size-5">{{$product->title}}</h2><br>
        <h3 class="is-inline">£{{$product->price}} x 1</h3>
        <span class="remove_product is-clickable ml-3" id="{{$product->id}}">
                <i class="fas fa-times-circle"></i>
        </span>
    </div>
</div>
