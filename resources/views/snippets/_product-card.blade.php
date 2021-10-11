<div class="column is-4">
    <a href="{{route('product_show', $product->title)}}">
        <div class="card hoverable" id="{{$product->title}}" style="background-color:hsl(0%,0%,92%)">
            <div class="card-image">
                <figure class="image is-4by3">
                <img src="{{asset('storage/' . $product->img)}}" alt="Product image">
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                <div class="media-content">
                    <p class="title is-4">{{$product->title}}</p>
                </div>
                </div>

                <div class="content">
                {{$product->desc}}
                <br><br>
                <strong>{{$product->price}}</strong>
                </div>
            </div>
        </div>
    </a>
</div>