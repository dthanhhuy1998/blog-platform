@extends('catalog.common.layout')

@section('content')
    <nav class="breadcrumb__wrap">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('catalog.homepage') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catalog.products') }}">Sản phẩm</a></li>
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
                        {!! $pageTitle !!}
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
                                <h4 class="show-text">Hiển thị {{ $products->count() }} - {{ $products->currentPage() }}/{{ $products->lastPage() }}  kết quả</h4>
                                <div class="option-show">
                                    <span>Hiển thị:</span>
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
                                    @foreach($products as $item)
                                    <div class="productBox">
                                        <div class="productBox__image">
                                            <img alt="{{ $item->name }}" class="lazy w-100" data-src="@if(!empty($item->product->image)) {{ asset('storage/app/' . $item->product->image) }} @else {{ asset('storage/app/uploads/default.png') }} @endif" src="{{ asset('public/catalog/assets/img/lazyload.jpg') }}"/>
                                        </div>
                                        <div class="productBox__content">
                                            <a title="{{ $item->name }}" class="productBox__content-name-link" href="{{ route('catalog.product', [$item->slug]) }}">
                                                {{ $item->name }}
                                            </a>
                                            <div class="productBox__content-price">
                                                <span class="productBox__content-price-price">Liên hệ</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="alert alert-warning" role="alert">
                                    Có <strong>{{ $products->count() }}</strong> sản phẩm tìm thấy
                                </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="horizontal" role="tabpanel" aria-labelledby="horizontal-tab">
                                @if(count($products) > 0)
                                <div class="product-horizal">
                                    @foreach($products as $item)
                                    <div class="productBox">
                                        <div class="productBox__image">
                                            <a title="{{ $item->name }}" href="{{ route('catalog.product', [$item->slug]) }}">
                                                <img alt="{{ $item->name }}" class="lazy w-100" data-src="@if(!empty($item->product->image)) {{ asset('storage/app/' . $item->product->image) }} @else {{ asset('storage/app/uploads/default.png') }} @endif" src="{{ asset('public/catalog/assets/img/lazyload.jpg') }}" />
                                            </a>
                                        </div>
                                        <div class="productBox__content">
                                            <a title="{{ $item->name }}" class="productBox__content-name-link" href="{{ route('catalog.product', [$item->slug]) }}">
                                                {{ $item->name }}
                                            </a>
                                            <div class="productBox__content-price">
                                                <span class="productBox__content-price-price">Liên hệ</span>
                                            </div>
                                            <div class="product-desc-list mt-3" style="font-size: 12px;">
                                                {!! $item->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="alert alert-warning" role="alert">
                                    Có <strong>{{ $products->count() }}</strong> sản phẩm tìm thấy
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
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}&key={{ $key }}" aria-label="Previous">
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
                                    <li class="page-item"><a class="page-link" href="{{ $products->url($i) }}&key={{ $key }}">{{$i }}</a></li>
                                @endif
                            @endfor
                            <!-- Next Page Link -->
                            @if ($products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}&key={{ $key }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}&key={{ $key }}" aria-label="Next">
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