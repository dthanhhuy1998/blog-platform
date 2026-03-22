@extends('catalog.common.layout')

@section('title')
    {!! $headingTitle !!}
@endsection

@section('content')
   <!-- Slide Title -->
   <div class="slide">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner slide-blog">
                <div class="carousel-item active" style="background-image: url('{{ asset('public/catalog/assets/img/bg1.jpg') }}');">
                <div class="carousel-caption title-post">
                    <div class="carousel-caption-text">
                        <h1>Giỏ hàng của bạn</h1>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./end Slide Title -->
    <nav class="breadcrumb__wrap">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div>
    </nav>
    <div class="article-wrap">
        <div class="container">
            <div class="cart">
                <h2 class="cart__heading">Giỏ hàng của bạn</h2>
                <!-- <div class="alert alert-empty" role="alert">
                    Không có sản phẩm trong giỏ. Vui lòng nhấn vào <a href="#">Mua hàng</a>!
                </div> -->
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th class="col-image"></th>
                            <th class="col-name">TÊN SẢN PHẨM</th>
                            <th class="col-price">GIÁ</th>
                            <th class="col-quantity">SỐ LƯỢNG</th>
                            <th class="col-total">TỔNG TIỀN</th>
                            <th class="col-action"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="row-image">
                                <img alt="A lazy image" class="lazy" data-src="{{ asset('public/catalog/assets/img/san-pham1.jpg') }}" src="{{ asset('public/catalog/assets/img/lazyload.jpg') }}" />
                            </td>
                            <td class="row-name">
                                Phantom Remote Control Ver 2018
                            </td>
                            <td class="row-price">
                                300.000 <u>đ</u>
                            </td>
                            <td class="row-quantity">
                                <input class="cart-qty" type="number" value="1" min="1" max="100">
                            </td>
                            <td class="row-total">
                                300.000 <u>đ</u>
                            </td>
                            <td class="row-action">
                                <button type="submit" class="btn btn-primary btn-edit-cart" name="edit"><i class="fas fa-pencil-alt"></i></button>
                                <button type="submit" class="btn btn-danger btn-remove-item" name="delete"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-image">
                                <img alt="A lazy image" class="lazy" data-src="{{ asset('public/catalog/assets/img/san-pham2.jpg') }}" src="{{ asset('public/catalog/assets/img/lazyload.jpg') }}" />
                            </td>
                            <td class="row-name">
                                Phantom Remote Control Ver 2018
                            </td>
                            <td class="row-price">
                                300.000 <u>đ</u>
                            </td>
                            <td class="row-quantity">
                                <input class="cart-qty" type="number" value="1" min="1" max="100">
                            </td>
                            <td class="row-total">
                                300.000 <u>đ</u>
                            </td>
                            <td class="row-action">
                                <button type="submit" class="btn btn-primary btn-edit-cart" name="edit"><i class="fas fa-pencil-alt"></i></button>
                                <button type="submit" class="btn btn-danger btn-remove-item" name="delete"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-image">
                                <img alt="A lazy image" class="lazy" data-src="{{ asset('public/catalog/assets/img/san-pham3.jpg') }}" src="{{ asset('public/catalog/assets/img/lazyload.jpg') }}" />
                            </td>
                            <td class="row-name">
                                Phantom Remote Control Ver 2018
                            </td>
                            <td class="row-price">
                                300.000 <u>đ</u>
                            </td>
                            <td class="row-quantity">
                                <input class="cart-qty" type="number" value="1" min="1" max="100">
                            </td>
                            <td class="row-total">
                                300.000 <u>đ</u>
                            </td>
                            <td class="row-action">
                                <button type="submit" class="btn btn-primary btn-edit-cart" name="edit"><i class="fas fa-pencil-alt"></i></button>
                                <button type="submit" class="btn btn-danger btn-remove-item" name="delete"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-image">
                                <img alt="A lazy image" class="lazy" data-src="{{ asset('public/catalog/assets/img/san-pham4.jpg') }}" src="{{ asset('public/catalog/assets/img/lazyload.jpg') }}" />
                            </td>
                            <td class="row-name">
                                Phantom Remote Control Ver 2018
                            </td>
                            <td class="row-price">
                                300.000 <u>đ</u>
                            </td>
                            <td class="row-quantity">
                                <input class="cart-qty" type="number" value="1" min="1" max="100">
                            </td>
                            <td class="row-total">
                                300.000 <u>đ</u>
                            </td>
                            <td class="row-action">
                                <button type="submit" class="btn btn-primary btn-edit-cart" name="edit"><i class="fas fa-pencil-alt"></i></button>
                                <button type="submit" class="btn btn-danger btn-remove-item" name="delete"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn-control-group">
                    <a href="#" class="btn btn-control continue">TIẾP TỤC MUA HÀNG</a>
                    <div class="dual-btn">
                        <a href="#" class="btn btn-control update">CẬP NHẬT</a>
                        <a href="#" class="btn btn-control remove">XÓA GIỎ HÀNG</a>
                    </div>
                </div>
                <div class="tab-payment">
                    <div class="total-title">
                        <span>Tổng tiền</span>
                        <span>300.000 <u>đ</u></span>
                    </div>
                    <a href="#" class="btn btn-payment">THANH TOÁN</a>
                </div>
            </div>
        </div>
    </div>
@endsection