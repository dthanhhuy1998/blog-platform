@extends('web.layouts.master')

@section('content')
<div class="container">
    <div class="featured">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12">
                @if ($latestPost)
                    <article class="blog">
                        <figure class="blog-image">
                            <img src="{{$latestPost->image ? asset('storage/'.$latestPost->image) : asset('/images/default.jpg')}}" alt="Pull Apart Chicken Bacon Ranch Sliders" class="blog-image-img" loading="lazy">
                        </figure>
                        @if($latestPost->categories)
                            @foreach($latestPost->categories as $category)
                                <a href="#" class="blog-category">
                                    <span>{{$category->name}}, </span>
                                </a>
                            @endforeach
                        @endif
                        <h2 class="blog-title">
                            <a href="#">{{ $latestPost->title }}</a>
                        </h2>
                    </article>
                @endif
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12">
                @if ($orderLatestPosts)
                    <div class="row">
                        @foreach ($orderLatestPosts as $post)
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <article class="blog">
                                    <figure class="blog-image">
                                        <img src="{{$post->image ? asset('storage/'.$post->image) : asset('/images/default.jpg')}}" alt="Pull Apart Chicken Bacon Ranch Sliders" class="blog-image-img" loading="lazy">
                                    </figure>
                                    @if($post->categories)
                                        <a href="#" class="blog-category">
                                            @foreach($post->categories as $category)
                                                <span>{{$category->name}}, </span>
                                            @endforeach
                                        </a>
                                    @endif
                                    <h2 class="blog-title">
                                        <a href="#">{{ $post->title }}</a>
                                    </h2>
                                    <span class="blog-author">
                                        {{__('By')}} 
                                        @if ($post->createdBy)
                                            <a href="#" class="author-name">{{ $post->createdBy->lastname }} {{ $post->createdBy->firstname }}</a>
                                        @endif
                                    </span>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <section class="blog-wrapper">
        <h2 class="blog__heading">{{__('Latest Posts')}}</h2>
        @if ($posts)
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-3 col-lg-3 col-xs-12">
                        <article class="blog">
                            <figure class="blog-image">
                                <a href="#">
                                    <img src="{{$post->image ? asset('storage/'.$post->image) : asset('/images/default.jpg')}}" alt="{{ $post->title }}" class="blog-image-img" loading="lazy">
                                </a>
                            </figure>
                            <a href="#" class="blog-category">
                                @foreach($post->categories as $category)
                                    <span>{{$category->name}}, </span>
                                @endforeach
                            </a>
                            <h2 class="blog-title">
                                <a href="#">{{ $post->title }}</a>
                            </h2>
                            <span class="blog-author">
                                {{__('By')}} 
                                @if ($post->createdBy)
                                    <a href="#" class="author-name">{{ $post->createdBy->lastname }} {{ $post->createdBy->firstname }}</a>
                                @endif
                            </span>
                        </article>
                    </div>
                @endforeach
            </div>
        @endif
        <!-- Hero Banner -->
        <div class="hero-banner">
            <img src="{{ asset('frontend/assets/images/hero-banner.png') }}" class="hero-banner-img" alt="Save 40% on Creative Cloud Pro">
        </div>
    </section>
</div>
@endsection