<div class="columns mt-2 mb-2 is-centered">
    <div class="column is-3">
        <figure class="image is-4by3">
            <img src="{{asset('storage/' . $product->img)}}" alt="Product image">
        </figure>
    </div>
    <div class="column">
        <p><strong>{{$product->title}}</strong></p><br>
        <p><strong>£{{$product->price}} x 1</strong></p>
    </div>
</div>
