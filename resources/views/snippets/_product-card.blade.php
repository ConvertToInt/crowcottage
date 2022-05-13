<div class="column is-4 mb-6">
    <a href="{{route('product_show', $product->title)}}">
        <div class="container" style="position:relative">
            <figure class="image is-square product_imgs">
                <img 
                class="img_shadow thumbnail_img" 
                id="img_{{$product->thumbnail_img->id}}" 
                src="{{asset('storage/' . $product->thumbnail_img->path)}}" 
                alt="Product image" 
                style="position:absolute; width:100%; height:100%; z-index:100;">

                <img 
                class="img_shadow secondary_img" 
                id="img_{{$product->secondary_img->id}}" 
                src="{{asset('storage/' . $product->secondary_img->path)}}" 
                alt="Product image" 
                style="position:absolute; width:100%; height:100%;">

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

<script>
    $(document).ready(function() {
        $('.product_imgs').hover(function() {
            $('.thumbnail_img').stop().fadeOut('slow');
            $('.secondary_img').stop().fadeIn('slow');
        }, function() {
            $('.secondary_img').stop().fadeOut('slow');
            $('.thumbnail_img').stop().fadeIn('slow');
        });
    });
</script>