@extends('catalog.common.layout')

@section('content')
    <div class="relative flex justify-center items-center bg-[url('{{asset('assets/frontend/img/background.jpg')}}')] bg-no-repeat bg-bottom bg-fixed bg-cover lg:h-[60vh] md:h-[50vh] sm:h-[40vh] h-[30vh]">
        <div class="absolute inset-0 bg-black/20"></div>

        <div class="p-5 z-50">
            <h1 class="section-title text-center lg:text-4xl md:text-3xl sm:text-2xl text-xl text-white uppercase font-extrabold md:mb-4 mb-2 uppercase">
                {{__('News')}} & {{__('Event')}}
            </h1>
            <p class="md:text-sm lg:text-lg text-[12px] lg:max-w-[50vw] md:max-w-[60vw] max-w-[90vw] text-center text-white italic font-light">
                {{__('Stay up-to-date with the latest news and events from CAP')}}
            </p>
        </div>
    </div>

    <!-- News & Event -->
    @if(count($articles) > 0)
        <section id="products" class="product-section flex justify-center lg:pt-28 lg:pb-20 md:py-15 sm:py-10 py-8 lg:px-20 md:px-15 sm:px-10 px-5">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach($articles as $article)
                    <a href="{{route('catalog.article', [$article->slug])}}" class="group block">
                        <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden cursor-pointer flex flex-col h-full">
                            <div class="relative aspect-video overflow-hidden lg:h-[240px] md:h-[200px] h-[170px]">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{$article->title}}" class="w-full h-full object-cover transform group-hover:scale-[1.07] transition-transform duration-500" />
                                <div class="bg-gray-50 font-bold text-[#f16543] absolute top-4 left-4 text-[10px] py-1 px-2 rounded-full">
                                    {{__('News')}}
                                </div>
                            </div>

                            <div class="md:p-4 p-2 flex flex-col flex-grow">
                                <div class="flex gap-3 items-center text-gray-500 text-xs mb-1 font-medium">
                                    <i data-lucide="calendar-days" class="w-4"></i>
                                    {{ date_string($article->created_at) }}
                                </div>

                                <h3 class="md:text-md text-sm font-bold text-gray-900 md:mb-3 mb-1 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                    {{ $article->title }}
                                </h3>

                                <p class="text-gray-600 md:text-sm text-[12px] line-clamp-3 md:mb-4 mb-2 flex-grow">
                                    {!! $article->summary !!}
                                </p>

                                <div class="flex items-center text-primary-600 font-medium md:text-sm text-[12px] mt-auto group/link text-blue-600 underline">
                                    {{__('Read more')}}
                                    <ChevronRight class="h-4 w-4 ml-1 transform group-hover/link:translate-x-1 transition-transform" />
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        <div class="w-full flex justify-center pb-4">
            <nav id="pagination" class="flex items-center gap-1"></nav>
        </div>
    @endif
@endsection
