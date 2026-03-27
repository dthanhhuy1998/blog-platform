@extends('web.layouts.master')

@section('content')
    <div class="container">
        <div class="blog-detail-wrapper">
            <nav aria-label="breadcrumb" class="blog-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('Homepage')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                </ol>
            </nav>

            <h2 class="blog__heading">{{$category->name}}</h2>
    
            @if (count($posts) > 0)
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-3 col-lg-3 col-xs-12">
                            <article class="blog">
                                <figure class="blog-image">
                                    <a href="{{generate_url($post)}}">
                                        <img src="{{$post->image ? asset('storage/'.$post->image) : asset('/images/default.jpg')}}" alt="{{ $post->title }}" class="blog-image-img" loading="lazy">
                                    </a>
                                </figure>
                                @foreach($post->categories as $category)
                                    <a href="{{route('category.show', ['locale' => app()->getLocale(), 'category' => $category->slug])}}" class="blog-category">
                                        <span>{{$category->name}}, </span>
                                    </a>
                                @endforeach
                                <h2 class="blog-title">
                                    <a href="{{generate_url($post)}}">{{ $post->title }}</a>
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
@endsection
