@extends('catalog.common.layout')

@section('title')
    {!! $headingTitle !!}
@endsection

@section('content')
   <!-- Slide Title -->
   <div class="slide">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner slide-blog">
                <div class="carousel-item active" style="background-image: url('{{ asset('catalog/assets/img/bg1.jpg') }}');">
                <div class="carousel-caption title-post">
                    <div class="carousel-caption-text">
                        <h1>{{ __('Payment') }}</h1>
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
                <li class="breadcrumb-item"><a href="#">{{__('Homepage')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Payment')}}</li>
            </ol>
        </div>
    </nav>
    <div class="article-wrap">
        <div class="container">
            <form id="payment-form" action="{{route('catalog.postPayment')}}" method="POST" class="card card-payment pb-3">
                @csrf
                <input type="hidden" name="cart_type" value="{{($isPromotion) ?? false;}}">
                <div class="card-body px-4">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-xs-12">
                            <h2 class="shopping-cart-detail__heading mt-3 mb-3">{{__('Order Details')}}</h2>
                            <div class="form-payment">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="lastname" class="required">{{__('Last Name')}}</label>
                                            <input type="text" class="form-control" name="lastname" value="" placeholder="Nhập họ của bạn">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="firstname" class="required">{{__('First Name')}}</label>
                                            <input type="text" class="form-control" name="firstname" value="" placeholder="Nhập tên của bạn">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="phone" class="required">{{__('Phone Number')}}</label>
                                            <input type="text" class="form-control" name="phone" value="" placeholder="Số điện thoại nhận hàng">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="province required">{{__('Province')}}</label>
                                            <select name="province" class="form-control" id="province">
                                                <option value="">{{__('Select Province')}}</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->matp }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="district" class="required">{{__('District')}}</label>
                                            <select name="district" class="form-control" id="district">
                                                <option value="">{{__('Select District')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="ward" class="required">{{__('Ward')}}</label>
                                            <select name="ward" class="form-control" id="ward">
                                                <option value="">{{__('Select Ward')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="address">{{__('Address')}}</label>
                                            <input type="text" class="form-control" name="address" value="" placeholder="Số nhà, tổ, ấp,..">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="note">{{__('Note')}}</label>
                                            <textarea name="note" class="form-control" id="note" rows="3" placeholder="Ghi chú đơn hàng"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="shopping-cart-detail">
                                <h2 class="shopping-cart-detail__heading text-center mt-3 mb-3">{{__('Your Order')}}</h2>
                                <div class="checkout-cart mt-5">
                                    <h3 class="checkout-cart-heading">
                                        <span>{{__('Product')}} ({{ $cart['count'] }})</span>
                                        <span>{{__('Total Price')}}</span>
                                    </h3>

                                    @if(count($cart['data']) > 0)
                                        <div class="checkout-cart-box">
                                            @foreach($cart['data'] as $item)
                                                <div class="checkout-cart-item">
                                                    <div class="checkout-cart-item-img">
                                                        <img src="{{ $item->options->image }}" class="w-100" alt="">
                                                    </div>
                                                    <div class="checkout-cart-item-detail">
                                                        <span class="name">{{ $item->name }}</span>
                                                        <span class="price">
                                                            đ{{ number_format($item->price) }} 
                                                            <span>(SL: {{ $item->qty }})</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="voucher-code">
                                        <label for="voucher_code">{{__('Voucher Code')}}</label>
                                        <div class="voucher-input">
                                            <input type="text" class="form-control" name="voucher_code" placeholder="{{__('Enter Voucher Code')}}">
                                            <button type="button" class="btn-voucher" data-action="{{route('vouchers.check')}}" data-method="POST">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="checkout-cart-total">
                                        <span>{{__('Sub Total')}}</span>
                                        <span style="color: #222;">{{ number_format($cart['total']) }}đ</span>
                                    </div>
                                    <div class="checkout-cart-total">
                                        <span>{{__('Discount')}}</span>
                                        <span style="color: #222;" class="display-discount">0đ</span>
                                    </div>
                                    <div class="checkout-cart-total">
                                        <span>{{__('Total')}}</span>
                                        <span class="display-total">{{ number_format($cart['total']) }}đ</span>
                                    </div>

                                    @if (count($cart['data']) > 0)
                                        <button type="submit" class="btn-checkout button-88">{{__('Payment')}}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
$(function() {
    $('select[name="province"]').on('change', function() {
        var provinceId = $(this).val();

        if (provinceId === '') {
            $('select[name="district"]').html('<option value="">Chọn Quận/Huyện</option>');
            $('select[name="ward"]').html('<option value="">Chọn Xã/Phường</option>');

            return;
        }

        $.ajax({
            url: '{{ route("ajax.getDistrictsByProvinceId") }}',
            method: 'GET',
            dataType: 'json',
            data: {
                province_id: provinceId
            },
            success: function(response) {
                if (response.status == 200) {
                    let renderData = `<option value="">Chọn Quận/Huyện</option>`;

                    $.map(response.data, function(item, index) {
                        renderData += `<option value="${item.maqh}">${item.name}</option>`; 
                    });

                    $('select[name="district"]').html(renderData);
                    $('select[name="ward"]').html('<option value="">Chọn Xã/Phường</option>');
                    
                }
            },
            error: function(err) {
                console.error(err);
            }
        })
    });

    $('select[name="district"]').on('change', function() {
        $.ajax({
            url: '{{ route("ajax.getWardsByDistrictId") }}',
            method: 'GET',
            dataType: 'json',
            data: {
                district_id: $(this).val()
            },
            success: function(response) {
                if (response.status == 200) {
                    let renderData = `<option value="">Chọn Xã/Phường</option>`;

                    $.map(response.data, function(item, index) {
                        renderData += `<option value="${item.maqh}">${item.name}</option>`; 
                    });

                    $('select[name="ward"]').html(renderData);
                }
            },
            error: function(err) {
                console.error(err);
            }
        })
    });

    $("#payment-form").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            phone: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 12,
            },
            province: {
                required: true,
            },
            district: {
                required: true,
            },
            ward: {
                required: true,
            }
        },
        messages: {
            firstname: {
                required: 'Nhập họ'
            },
            lastname: {
                required: 'Nhập tên'
            },
            phone: {
                required: 'Nhập số điện thoại',
                number: 'Số điện thoại không đúng định dạng',
                minlength: 'Số điện thoại tối thiểu 10 số',
                maxlength: 'Số điện thoại tối đa 12 số',
            },
            province: {
                required: 'Chọn Tỉnh/TP',
            },
            district: {
                required: 'Chọn Quận/Huyện',
            },
            ward: {
                required: 'Chọn Phường/Xã',
            }
        },
        submitHandler: function(form) {
            let paymentForm = $('#payment-form');
            let btnCheckout = $('.btn-checkout');

            $.ajax({
                url: paymentForm.attr('action'),
                method: paymentForm.attr('method'),
                dataType: 'json',
                data: paymentForm.serialize(),
                beforeSend: function() {
                    btnCheckout.attr('disabled', 'disabled');
                    btnCheckout.html('Đang xử lý đơn hàng...');
                    btnCheckout.css('opacity', 0.5);
                    btnCheckout.css('cursor', 'no-drop');
                },
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Thành công",
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });

                        setTimeout(function() { 
                            location.href = response.redirect;
                        }, 2000);
                    }
                },
                error: function(err) {
                    console.error(err);
                }
            });
        }
    });

    $('body').on('click', '.btn-voucher', function() {
        const action = $(this).data('action');
        const method = $(this).data('method');

        const voucherCode = $(this)
            .siblings('input[name="voucher_code"]')
            .val();

        if (!voucherCode) {
            alert('Vui lòng nhập mã voucher');
            return;
        }

        $.ajax({
            url: action,
            method: method,
            dataType: 'json',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                voucher_code: voucherCode
            },
            success: function(res) {
                if (!res.success) {
                    alert(res.message);
                    $('body')
                        .find('input[name="voucher_code"]')
                        .val('');

                    return;
                }

                $('body').find('.display-discount').text(res.discount + 'đ');
                $('body').find('.display-total').text(res.total + 'đ');
            },
            error: function(err) {
                console.error(err);
            }
        });

        // checkVoucherCode(params);    
    });
});
</script>
@endsection