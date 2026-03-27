@extends('web.layouts.master')

@section('content')
    <div class="container">
        <div class="blog-detail-wrapper">
            <nav aria-label="breadcrumb" class="blog-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('Homepage')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('category.show', ['locale' => app()->getLocale(), 'category' => $post->categories->first()->slug])}}">{{$post->categories->first()->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-8">
                    <article class="blog-post">
                        <header class="blog-post__header">
                            <h1 class="blog-post__title">{{$post->title}}</h1>
                            <div class="blog-post__meta">
                                <span class="blog-post__author">{{__('By')}} <a href="#">{{$post->createdBy->lastname}} {{$post->createdBy->firstname}}</a></span>
                                <span class="blog-post__date">{{$post->created_at->format('M d, Y')}}</span>
                            </div>
                        </header>

                        <div class="blog-post__content">
                            <div>{!! $post->content !!}</div>

                            <div class="blog-post__tags">
                                <span class="tag-label">{{__('Tag')}}:</span>
                                {{-- <a href="#" class="tag-item">Meet</a>
                                <a href="#" class="tag-item">Shamrock Plant</a> --}}
                            </div>

                            <section class="blog-post__resources">
                                <h3 class="resources-title">References & Resources</h3>
                                <ul class="resources-list">
                                    <li><a href="#">WebMD: Japanese Apricot Uses</a></li>
                                    <li><a href="#">WebMD: Japanese Apricot Uses</a></li>
                                    <li><a href="#">WebMD: Japanese Apricot Uses</a></li>
                                    <li><a href="#">WebMD: Japanese Apricot Uses</a></li>
                                    <li><a href="#">WebMD: Japanese Apricot Uses</a></li>
                                </ul>
                            </section>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <aside class="blog-sidebar">
                        <div class="sidebar-ad">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/images/hero-banner.png') }}" alt="Image" class="img-fluid sidebar-ad-img">
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
