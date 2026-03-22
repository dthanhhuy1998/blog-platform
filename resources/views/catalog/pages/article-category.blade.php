@extends('catalog.common.layout')

@section('content')
    <nav class="breadcrumb__wrap">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a title="Trang chủ" href="{{ route('catalog.homepage') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
            </ol>
        </div>
    </nav>
    <div class="article-wrap">
        <div class="container">
            <h1 class="article__title">
                {{ $category->name }}
            </h1>
            @if(count($articleToCategory) > 0)
                <div class="articleList">
                    @foreach($articleToCategory as $category)
                    <div class="postBox">
                        <div class="postBox__image">
                            <a href="{{ route('catalog.article', [$category->article->slug]) }}" title="{{ $category->article->title }}">
                                <img class="w-100" src="@if(!empty($category->article->image)) {{ asset('storage/' . $category->article->image) }} @else {{ asset('storage/uploads/default.png') }} @endif" alt="{{ $category->article->title }}" title="{{ $category->article->title }}">
                            </a>
                        </div>
                        <div class="postBox__content">
                            <a title="{{ $category->article->title }}" href="{{ route('catalog.article', [$category->article->slug]) }}" class="postBox__content-title">{{ $category->article->title }}</a>
                            <div class="postBox__content-desc">
                                {!! $category->article->summary !!}
                            </div>
                            <span class="postBox__bottom-time ">
                                <i class="far fa-calendar-alt"></i> {{ date_string($category->article->created_at) }}
                                |
                                <i class="fas fa-eye"></i> {{ $category->article->view }} lượt xem
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                   Danh mục này chưa có bài viết!
                </div>
            @endif

            @if($articleToCategory->hasPages())
            <nav aria-label="...">
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($articleToCategory->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $articleToCategory->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $articleToCategory->lastPage(); $i++)
                        @if($articleToCategory->currentPage() == $i)
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $i }}</span>
                        </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $articleToCategory->url($i) }}">{{$i }}</a></li>
                        @endif
                    @endfor
                    <!-- Next Page Link -->
                    @if ($articleToCategory->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $articleToCategory->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" href="{{ $articleToCategory->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            @endif
        </div>
    </div>
@endsection