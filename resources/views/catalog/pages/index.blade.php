@extends('catalog.common.layout')

@section('content')
<div class="swiper mySwiper">
    @if(count($slides) > 0)
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
                <div class="swiper-slide relative overflow-hidden">
                    <img alt="Slide 1" src="{{asset('storage/'. $slide->image)}}" class="w-full h-[300px] sm:h-[400px] md:h-[550px] lg:h-[650px] object-cover" />
                    {{-- <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                        <div class="flex flex-col justify-center items-center md:w-[80%] w-[90%] mt-10 md:mt-5 lg:mt-0  lg:w-[50%] text-center p-4 md:py-8 py-2  rounded-2xl">
                            <h2 class="text-md sm:text-xl md:text-4xl
                                font-bold uppercase text-white
                                lg:w-[80%] w-[90%]
                                leading-snug sm:leading-normal md:leading-relaxed
                                md:mb-4 mb-2">
                                Tiêu đề Slide của bạn Lorem ipsum dolor sit amet
                            </h2>
                            <p class="text-[10px] md:text-lg  leading-relaxed line-clamp-3 md:line-clamp-none text-white italic font-light" style="text-shadow: 0 2px 6px rgba(0, 0, 0, 0.7)">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                                sequi vero totam deserunt, a porro temporibus et, iste quibusdam
                                eveniet nisi ut dolorum distinctio autem maiores sapiente
                                labore.
                            </p>

                            <button class="mt-8 sm:mt-12 md:mt-20
                                px-6 py-3 md:px-8 md:py-4
                                text-xs md:text-base
                                font-semibold uppercase tracking-wide
                                text-[#d85435]
                                rounded-lg
                                transition-all duration-300
                                hover:bg-[#d85435] hover:text-white
                                hover:-translate-y-0.5 hover:shadow-lg
                                active:scale-[0.97] bg-white">
                                Xem chi tiết
                            </button>
                        </div>
                    </div> --}}
                </div>
            @endforeach
        </div>

        <div class="swiper-button-next text-white w-10"></div>
        <div class="swiper-button-prev text-white w-10"></div>
    @endif
</div>

@if(config('site.homepage.about_us'))
    <div class="group flex flex-col mt-5 lg:flex-row gap-10 px-5 sm:px-10 lg:px-20 py-10 overflow-hidden w-full bg-[#f9f9ff] min-h-[60vh]">
        <!-- Left content -->
        <div class="md:flex-1 flex flex-col justify-center md:justify-start" data-aos="fade-up-right">
            <p class="md:text-xl text-lg text-[#222] font-bold">{{config('site.homepage.about_us.label')}}</p>

            <h1 class="relative mt-3 inline-block uppercase
                    text-[#f16543]
                    text-xl sm:text-2xl lg:text-3xl
                    font-bold mb-2
                    leading-snug sm:leading-normal lg:leading-relaxed
                    after:content-[''] after:absolute after:left-0 after:-bottom-1
                    after:h-[2px] after:w-0 
                    after:transition-all after:duration-500
                    group-hover:after:w-[100%] text-justify">
                {{config('site.homepage.about_us.title')}}
            </h1>
            {!!config('site.homepage.about_us.description')!!}
        </div>

        <!-- Right image block -->
        <div class="relative min-h-[250px] sm:min-h-[300px] w-full overflow-hidden text-white flex flex-col justify-end p-6 transition-transform duration-700 flex-1" data-aos="fade-left">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110" style="
                background-image: url({{config('site.homepage.about_us.image')}});
            "></div>
        </div>
    </div>
@endif

<!-- sản phẩm -->
<section id="products" class="product-section flex justify-center lg:py-20 md:py-15 sm:py-10 py-8">
    <div class="container w-full">
        <div class="flex justify-center mb-5">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 w-[90%]">
                <div class="max-w-2xl">
                    <p class="text-[#f16543] font-semibold tracking-wider md:text-sm text-[12px] uppercase">
                        {{__('Featured products')}}
                    </p>
                    <h2 class="mt-2 lg:text-3xl md:text-2xl uppercase text-xl font-extrabold text-[#1a5d2b] sm:text-4xl">
                        {{__('A crystallization of intelligence and technology')}}
                    </h2>
                    <p class="md:mt-4 mt-2 md:text-sm text-[12px]">
                        {{__('The products are the result of scientific research and experimental production at the center')}}
                    </p>
                </div>

                <div class="flex-shrink-0">
                    <a href="{{route('catalog.products')}}" class="inline-flex items-center justify-center px-3 py-2 border border-[#f16543] md:text-sm text-[10px] font-medium rounded-lg text-[#f16543] bg-white transition-colors hidden md:block">
                        {{__('View All')}}
                    </a>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="swiper productSwiper w-[90%] py-4  ">
                @if(count($lastedProduct) > 0)
                    <div class="swiper-wrapper items-stretch ">
                        @foreach($lastedProduct as $product)
                            <div class="swiper-slide group ">
                                <a href="{{route('catalog.product', [$product->productDescription->slug])}}" title="{{$product->productDescription->name}}" class="h-full ">
                                    <div class="product-card bg-white rounded-lg overflow-hidden shadow-md border border-[#eee] transition-transform duration-300 hover:shadow-xl">
                                        <div class="card-img h-[240px] overflow-hidden">
                                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.10]" src="{{asset('storage/'. $product->image)}}" alt="{{$product->title}}" />
                                        </div>
                                        <div class="card-body p-4 h-full md:min-h-[180px] min-h-[200px] flex justify-between flex-col">
                                            <div>
                                                <p class="title text-[16px] font-bold text-[#333] leading-[1.4] line-clamp-1 mb-2">{{$product->productDescription->name}}</p>
                                            <p class="desc text-[13px] text-[#777] line-clamp-2 mb-4">
                                                {{ excerpt_html($product->productDescription->description, 120) }}
                                            </p>
                                            </div>
                                            <div class="card_footer grid md:grid-cols-2 grid-cols-1 item-center gap-4">
                                                <div class="price md:text-[15px] text-[12px] font-extrabold text-[#f16543]">
                                                    {{ number_format($product->price) }} VNĐ
                                                </div>
                                                <a href="{{route('catalog.product', [$product->productDescription->slug])}}" class="btn-buy text-center inline-block bg-[#f16543] text-white px-4 py-2 rounded-full text-[10px] font-extrabold uppercase transition-all hover:bg-[#e05534] hover:scale-[1.05] w-full">
                                                    {{__('Buy Now')}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="swiper-button-prev absolute top-1/2 -left-12 -translate-y-1/2 w-10 h-10 rounded-full flex items-center justify-center z-10"></div>

            <div class="swiper-button-next absolute top-1/2 -right-12 -translate-y-1/2 w-10 h-10 rounded-full flex items-center justify-center z-10"></div>
        </div>
    </div>
</section>

<!-- Lính vực hoạt động -->
<section class="relative bg-[url('{{asset('assets/frontend/img/background.jpg')}}')] bg-no-repeat bg-bottom bg-fixed bg-cover px-5">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="max-w-7xl mx-auto relative z-10 py-10">
        <div class="text-center max-w-3xl mx-auto mb-10">
            <p class="font-semibold text-white tracking-wider text-sm uppercase">
                Giá trị vững bền
            </p>

            <h2 class="mt-2 text-xl text-[#fff] font-bold sm:text-3xl lg:text-4xl uppercase">
                Lĩnh vực hoạt động cốt lõi
            </h2>
            <p class="md:mt-4 mt-2 md:text-sm text-[12px]  text-white">
                Chúng tôi cam kết mang lại giá trị thực tiễn thông qua nghiên cứu,
                đào tạo và hợp tác phát triển bền vững.
            </p>
        </div>

        <div class="grid  grid-cols-2 lg:grid-cols-4 lg:gap-8 md:gap-5 gap-3">
            <!-- Thẻ 1 -->
            <div class="group h-full bg-white rounded-xl md:p-6 p-3 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 ease-in-out flex flex-col items-start cursor-default">
                <div class="mb-6 md:p-4 p-2 rounded-full bg-blue-50 text-[#f16543] group-hover:bg-[#f16543] group-hover:text-white transition-colors duration-300">
                    <i data-lucide="badge-dollar-sign" class="my-class"></i>
                </div>
                <h3 class="md:text-lg text-md font-bold text-slate-800 uppercase tracking-wide mb-4 group-hover:text-[#f16543] transition-colors">
                    Sản xuất và thương mại hóa
                </h3>

                <div class="w-12 h-1 bg-[#f16543] mb-4 rounded-full group-hover:w-20 group-hover:bg-[#1a5d2b] transition-all duration-300"></div>
                <ul class="space-y-3 text-black flex-grow">
                    <li key="1" class="flex items-start md:text-sm text-[12px] leading-relaxed">
                        <span class="mr-2 mt-1.5 w-1.5 h-1.5 bg-[#f16543] addEventListener rounded-full flex-shrink-0"></span>
                        <span>Sản xuất và thương mại hóa các sản phẩm đặc trưng.</span>
                    </li>
                    <li key="2" class="flex items-start md:text-sm text-[12px] leading-relaxed">
                        <span class="mr-2 mt-1.5 w-1.5 h-1.5 bg-[#f16543] addEventListener rounded-full flex-shrink-0"></span>
                        <span>Nước uống, rượu và sản phẩm trong lĩnh vực nông nghiệp và
                            thực phẩm.</span>
                    </li>
                </ul>
            </div>
            <!-- Thẻ 2 -->
            <div class="group h-full bg-white rounded-xl md:p-6 p-3 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 ease-in-out flex flex-col items-start cursor-default">
                <div class="mb-6 md:p-4 p-2 rounded-full bg-blue-50 text-[#f16543] group-hover:bg-[#f16543] group-hover:text-white transition-colors duration-300">
                    <i data-lucide="binoculars" class="my-class"></i>
                </div>
                <h3 class="md:text-lg text-md font-bold text-slate-800 uppercase tracking-wide mb-4 group-hover:text-[#f16543] transition-colors">
                    Nghiên cứu và ứng dụng công nghệ
                </h3>

                <div class="w-12 h-1 bg-[#f16543] mb-4 rounded-full group-hover:w-20 group-hover:bg-[#1a5d2b] transition-all duration-300"></div>
                <ul class="space-y-3 text-slate-600 flex-grow">
                    <li key="1" class="flex text-black items-start md:text-sm text-[12px] leading-relaxed">
                        <span class="mr-2 mt-1.5 w-1.5 h-1.5 bg-[#f16543] addEventListener rounded-full flex-shrink-0"></span>
                        <span>Nghiên cứu, thử nghiệm và hoàn thiện quy trình sản
                            xuất.</span>
                    </li>
                    <li key="2" class="flex text-black items-start md:text-sm text-[12px] leading-relaxed">
                        <span class="mr-2 mt-1.5 w-1.5 h-1.5 bg-[#f16543] addEventListener rounded-full flex-shrink-0"></span>
                        <span>Gắn kết nghiên cứu khoa học với nhu cầu thực tế.</span>
                    </li>
                </ul>
            </div>
            <!-- Thẻ 3 -->
            <div class="group h-full bg-white rounded-xl md:p-6 p-3 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 ease-in-out flex flex-col items-start cursor-default">
                <div class="mb-6 md:p-4 p-2 rounded-full bg-blue-50 text-[#f16543] group-hover:bg-[#f16543] group-hover:text-white transition-colors duration-300">
                    <i data-lucide="handshake" class="my-class"></i>
                </div>
                <h3 class="md:text-lg text-md font-bold text-slate-800 uppercase tracking-wide mb-4 group-hover:text-[#f16543] transition-colors">
                    Hợp tác và chuyển giao
                </h3>

                <div class="w-12 h-1 bg-[#f16543] mb-4 rounded-full group-hover:w-20 group-hover:bg-[#1a5d2b] transition-all duration-300"></div>
                <ul class="space-y-3 text-slate-600 flex-grow">
                    <li class="flex text-black items-start md:text-sm text-[12px] leading-relaxed">
                        <span class="mr-2 mt-1.5 w-1.5 h-1.5 bg-[#f16543] rounded-full flex-shrink-0"></span>
                        <span>Cầu nối giữa Trường Đại học Kiên Giang với doanh
                            nghiệp.</span>
                    </li>
                    <li class="flex text-black items-start md:text-sm text-[12px] leading-relaxed">
                        <span class="mr-2 mt-1.5 w-1.5 h-1.5 bg-[#f16543] rounded-full flex-shrink-0"></span>
                        <span>Tư vấn kỹ thuật, chuyển giao quy trình.</span>
                    </li>
                </ul>
            </div>

            <!-- Thẻ 4 -->
            <div class="group h-full bg-white rounded-xl md:p-6 p-3 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 ease-in-out flex flex-col items-start cursor-default">
                <div class="mb-6 md:p-4 p-2 rounded-full bg-blue-50 text-[#f16543] group-hover:bg-[#f16543] group-hover:text-white transition-colors duration-300">
                    <i data-lucide="graduation-cap" class="my-class"></i>
                </div>
                <h3 class="md:text-lg text-md font-bold text-slate-800 uppercase tracking-wide mb-4 group-hover:text-[#f16543] transition-colors">
                    Đào tạo thực tiễn
                </h3>

                <div class="w-12 h-1 bg-[#f16543] mb-4 rounded-full group-hover:w-20 group-hover:bg-[#1a5d2b] transition-all duration-300"></div>
                <ul class="space-y-3 text-slate-600 flex-grow">
                    <li class="flex text-black items-start md:text-sm text-[12px] leading-relaxed">
                        <span class="mr-2 mt-1.5 w-1.5 h-1.5 bg-[#f16543] rounded-full flex-shrink-0"></span>
                        <span>Môi trường thực hành chuyên nghiệp cho sinh viên.</span>
                    </li>
                    <li class="flex text-black items-start md:text-sm text-[12px] leading-relaxed">
                        <span class="mr-2 mt-1.5 w-1.5 h-1.5 bg-[#f16543] rounded-full flex-shrink-0"></span>
                        <span>Gắn đào tạo lý thuyết với thực tiễn sản xuất.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Blogs & Events -->
<section class="py-10 px-4 md:px-10 lg:px-20">
    <!-- Header Component -->
    <div class="w-full mb-8 relative">
        <div class="absolute bottom-0 left-0 w-full h-[1px] bg-gray-200"></div>

        <h2 class="section-title text-center text-2xl text-[#1a5d2b] uppercase font-extrabold mb-4">
            {{__('News')}} & {{__('Event')}}
        </h2>

        <div class="title-underline w-[90px] h-[4px] bg-[#f16543] mx-auto mb-8 rounded-sm"></div>
    </div>

    <!-- Slider Component -->
    <div class="relative w-full lg:px-20 md:px-15 sm:px-12">
        <div class="mb-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
                @if(count($articles) > 0)
                    @foreach($articles as $article)
                        <a href="{{route('catalog.article', [$article->slug])}}" class="group">
                            <div class="overflow-hidden rounded-md">
                                <img src="{{asset('storage/'. $article->image)}}" alt="{{$article->title}}" class="w-full h-40 sm:h-48 lg:h-55 object-cover transition-transform duration-500 group-hover:scale-110" />
                            </div>
                            <div class="py-3">
                                <p class="text-md font-bold line-clamp-2 transition-all duration-500 group-hover:text-[#f16543] uppercase">{{$article->title}}</p>
                                <p class="font-light line-clamp-3 text-sm italic mt-2">
                                    {{ excerpt_html($article->summary, 200) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
