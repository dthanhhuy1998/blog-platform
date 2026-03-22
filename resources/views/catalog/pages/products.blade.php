@extends('catalog.common.layout')

@section('content')
<div class="relative flex justify-center items-center bg-[url('{{asset('assets/frontend/img/background.jpg')}}')] bg-no-repeat bg-bottom bg-fixed bg-cover lg:h-[60vh] md:h-[50vh] sm:h-[40vh] h-[30vh]">
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="p-5 z-50">
        <h1 class="section-title text-center lg:text-4xl md:text-3xl sm:text-2xl text-xl text-white uppercase font-extrabold md:mb-4 mb-2 uppercase">
            {{__('Our Products')}}
        </h1>
        <p class="md:text-sm lg:text-lg text-[12px] lg:max-w-[50vw] md:max-w-[60vw] max-w-[90vw] text-center text-white italic font-light">
            {{__('Providing a diverse range of high-quality agricultural and food products to meet consumer needs and ensure sustainable distribution')}}
        </p>
    </div>
</div>

@if(count($products) > 0)
    <section id="products" class="product-section flex justify-center lg:pt-28 lg:pb-20 md:py-15 sm:py-10 py-8 lg:px-20 md:px-15 sm:px-10 px-5">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-5 gap-3">
            @foreach($products as $product)
                <div class="swiper-slide h-full group">
                    <a href="{{route('catalog.product', [$product->productDescription->slug])}}" title="{{$product->productDescription->name}}" class="block h-full">
                        <div class="product-card h-full bg-white rounded-lg  shadow-md border border-[#eee] flex flex-col">
                            <div class="card-img md:h-[240px] h-[200px] overflow-hidden flex-shrink-0">
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.08]" src="{{asset('storage/' . $product->image)}}" />
                            </div>
                            <div class="card-body md:p-4 p-2 flex flex-col flex-1">
                                <h2 class="title text-[16px] font-bold text-[#333] leading-[1.4] line-clamp-1 min-h-[44px]">{{$product->productDescription->name}}</h2>
                                <div class="desc text-[13px] text-[#777] line-clamp-2 mt-1 min-h-[36px]">{{ excerpt_html($product->productDescription->description, 200) }}</div>
                                <div class="grid md:grid-cols-2 grid-cols-1 gap-5 justify-between items-center gap-2 mt-auto pt-4">
                                    <div class="price md:text-[15px] text-[12px] font-extrabold text-[#f16543]">{{number_format($product->price)}} VNĐ</div>
                                    <button class="btn-buy hover:bg-[#e05534] hover:scale-[1.05] transition-all inline-block bg-[#f16543] text-white text-center px-4 py-2 rounded-full text-[10px] font-extrabold uppercase">
                                        {{__('Buy Now')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <div class="w-full flex justify-center pb-4">
        <nav id="pagination" class="flex items-center gap-1">1</nav>
    </div>
@endif
@endsection
