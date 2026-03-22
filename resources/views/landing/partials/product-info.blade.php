<div class="row">
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <input type="hidden" name="product_name" value="{{$product->description->name}}">
    <input type="hidden" name="product_price" value="{{$product->price}}">
    <input type="hidden" name="product_image" value="{{asset('storage/'. $product->image)}}">
    <!-- LEFT: IMAGE -->
    <div class="col-md-6">
        <div class="swiper productSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{asset('storage/'. $product->image)}}" class="img-fluid rounded">
                </div>

                @if (count($product->images) > 0)
                    @foreach($product->images as $item)
                        <div class="swiper-slide">
                            <img src="{{asset('storage/'. $item->image)}}" class="img-fluid rounded">
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- RIGHT: INFO -->
    <div class="col-md-6">
        <h3 class="product-name">{{ $product->description->name }}</h3>
        <h4 class="text-danger">{{ number_format($product->price) }} ₫</h4>

        <p>{!!$product->description->description!!}</p>

        <!-- Quantity -->
        <div class="d-flex align-items-center mb-3 cart-controls">
            <button class="btn btn-outline-secondary btn-qty-minus">-</button>
            <input type="text" class="form-control mx-2 text-center product-qty" value="1" style="width:70px">
            <button class="btn btn-outline-secondary btn-qty-plus">+</button>
        </div>

        <button class="btn btn-danger w-100 rounded-pill btn-add-to-cart" data-id="{{ $product->id }}">
            <i class="fas fa-shopping-cart me-2"></i>{{__('Add To Cart')}}
        </button>
    </div>
</div>
