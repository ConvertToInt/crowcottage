<div class="column is-4 mb-6">
    <a href="{{route('product_show', $product->title)}}">
        <div class="container" style="position:relative">
            <figure class="image is-square product_imgs" id="{{$product->id}}">
                <img
                class="img_shadow"
                id="{{$product->id}}_thumbnail_img"
                src="{{asset('storage/' . $product->primary_thumbnail_img->path)}}"
                alt="Product image"
                style="position:absolute; width:100%; height:100%; z-index:100;">

                <?php if ($product->secondary_thumbnail_img) : ?>
                    <img
                    class="img_shadow"
                    id="{{$product->id}}_secondary_img"
                    src="{{asset('storage/' . $product->secondary_thumbnail_img->path)}}"
                    alt="Product image"
                    style="position:absolute; width:100%; height:100%;">
                <?php endif; ?>
            </figure>
        </div>
    </a>
    <div>
        <p class="mt-2 has-text-centered is-size-5">{{$product->title}}
        @if($product->is_sold())
            <span class="sold_dot"></span>
        @endif
        </p>
    </div>
</div>
