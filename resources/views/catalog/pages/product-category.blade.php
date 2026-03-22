@extends('catalog.common.layout')

@section('content')
    <nav class="breadcrumb__wrap">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('catalog.homepage') }}">{{__('Homepage')}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catalog.products') }}">{{__('Product')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
            </ol>
        </div>
    </nav>
    <div class="article-wrap">
        <div class="container">
            <div class="row flex-wrap-reverse">
                <div class="col-md-3">
                    @include('catalog.common.product-sidebar-left')
                </div>
                <div class="col-md-9">
                    <h1 class="article__title">
                        {{ $category->name }}
                    </h1>
                    <div class="productCategory">
                        <ul class="nav nav-pills control-panel mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="vertical-tab" data-bs-toggle="pill" data-bs-target="#vertical" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                    <i class="fa fa-th"></i>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="horizontal-tab" data-bs-toggle="pill" data-bs-target="#horizontal" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <i class="fas fa-th-list"></i>
                                </button>
                            </li>
                            <div class="option-panel">
                                <h4 class="show-text">{{__('Display')}} {{ $products->count() }} - {{ $products->currentPage() }}/{{ $products->lastPage() }}  {{__('results')}}</h4>
                                <div class="option-show">
                                    <span>{{__('Display')}}:</span>
                                    <select name="" id="">
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <!-- <div class="option-show">
                                    <span>Sắp xếp:</span>
                                    <select name="" id="">
                                        <option value="default">Mặc định</option>
                                        <option value="sort_by_name">Xếp theo tên</option>
                                        <option value="sort_by_price">Xếp theo giá</option>
                                    </select>
                                </div> -->
                            </div>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="vertical" role="tabpanel" aria-labelledby="vertical-tab">
                                @if(count($products) > 0)
                                <div class="product-vertical">
                                    @foreach($products as $product)
                                        <div class="productBox">
                                            <div class="productBox__image">
                                                <img alt="{{ $product->productDescription->name }}" class="lazy w-100" data-src="@if(!empty($product->image)) {{ asset('storage/' . $product->image) }} @else {{ asset('storage/uploads/default.png') }} @endif" src="{{ asset('catalog/assets/img/lazy-product.png') }}" />
                                            </div>
                                            <div class="productBox__content">
                                                <a title="{{ $product->productDescription->name }}" class="productBox__content-name-link" href="{{ route('catalog.product', [$product->productDescription->slug]) }}">
                                                    {{ $product->productDescription->name }}
                                                </a>
                                                <div class="productBox__content-price">
                                                    @if($product->price == 0)
                                                        <span class="productBox__content-price-price">Liên hệ</span>
                                                    @else
                                                        <span class="productBox__content-price-price">{{ number_format($product->price) }}</span>
                                                        @if($product->original_price > 0)
                                                            <span class="productBox__content-price-discount">{{ number_format($product->original_price) }}</span>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="horizontal" role="tabpanel" aria-labelledby="horizontal-tab">
                                @if(count($products) > 0)
                                <div class="product-horizal">
                                    @foreach($products as $product)
                                        <div class="productBox">
                                            <div class="productBox__image">
                                                <a title="{{ $product->productDescription->name }}" href="{{ route('catalog.product', [$product->productDescription->slug]) }}">
                                                    <img alt="{{ $product->productDescription->name }}" class="lazy w-100" data-src="@if(!empty($product->image)) {{ asset('storage/' . $product->image) }} @else {{ asset('storage/uploads/default.png') }} @endif" src="{{ asset('catalog/assets/img/lazy-product.png') }}" />
                                                </a>
                                            </div>
                                            <div class="productBox__content">
                                                <a title="{{ $product->productDescription->name }}" class="productBox__content-name-link" href="{{ route('catalog.product', [$product->productDescription->slug]) }}">
                                                    {{ $product->productDescription->name }}
                                                </a>
                                                <div class="productBox__content-price">
                                                    @if($product->price == 0)
                                                        <span class="productBox__content-price-price">Liên hệ</span>
                                                    @else
                                                        <span class="productBox__content-price-price">{{ number_format($product->price) }}</span>
                                                        @if($product->original_price > 0)
                                                            <span class="productBox__content-price-discount">{{ number_format($product->original_price) }}</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="product-desc-list mt-3" style="font-size: 12px;">
                                                    {!! $product->productDescription->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($products->hasPages())
                        <nav aria-label="...">
                            <ul class="pagination">
                                <!-- Previous Page Link -->
                                @if ($products->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    @if($products->currentPage() == $i)
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $i }}</span>
                                    </li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $products->url($i) }}">{{$i }}</a></li>
                                    @endif
                                @endfor
                                <!-- Next Page Link -->
                                @if ($products->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection