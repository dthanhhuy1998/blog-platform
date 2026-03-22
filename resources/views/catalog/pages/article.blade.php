@extends('catalog.common.layout')

@section('content')
    <div class="min-h-screen bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10 pt-8 md:pt-10 lg:pt-18">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Main Content -->
                <main class="lg:col-span-8">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">{{ $article->title }}</h1>

                    <div class="flex items-center space-x-6 text-gray-500 text-sm mb-8 border-b border-gray-100 pb-8">
                        <div class="flex items-center">
                            <i class="fa-solid fa-user mr-2"></i>
                            <span class="font-medium text-gray-900">CAP</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fa-solid fa-calendar-days mr-2"></i>
                            <span>{{ date_string($article->created_at) }}</span>
                        </div>
                    </div>

                    <img src="{{ asset('storage/' . $article->image) }}" alt="Bài viết" class="w-full h-auto rounded-xl shadow-lg mb-10 object-cover max-h-[500px]" />

                    <div class="prose prose-lg prose-blue max-w-none text-gray-800">
                        {!! $article->summary !!}
                    </div>
                    <div class="prose prose-lg prose-blue max-w-none text-gray-800">
                        {!! $article->content !!}
                    </div>
                </main>

                <!-- Sidebar -->
                <aside class="lg:col-span-4 space-y-8">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 sticky top-24">
                        <h3 class="text-xl font-bold text-[#f16543] underline mb-6 border-l-4 border-primary-500 pl-3">
                            {{__('Latest News')}}
                        </h3>

                        @if(count($lastedArticle) > 0)
                            <div class="space-y-6">
                                @foreach($lastedArticle as $article)
                                    <a href="{{route('catalog.article', [$article->slug])}}" class="group flex gap-4 items-start">
                                        <div class="flex-shrink-0 w-20 h-20 overflow-hidden rounded-lg">
                                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{$article->title}}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-300" />
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 text-sm leading-snug group-hover:text-primary-600 transition-colors line-clamp-3">{{$article->title}}</h4>
                                            <span class="text-xs text-gray-400 mt-2 block">{{ date_string($article->created_at) }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
