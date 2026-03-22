@extends('landing.layout')

@push('favicon')
    <link rel="icon" type="image/x-icon" href="{{$favicon['image']}}">
@endpush

@section('content')
    <header class="promo-header">
        <div class="topbar py-2">
            <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div class="d-flex align-items-center gap-3">
                    <span><i class="fas fa-globe me-2"></i>mayhomevn.com</span>
                    <span><i class="fas fa-phone me-2"></i>Hotline: 0913 702 836</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <nav class="main-nav">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <a class="navbar-brand" href="/">
                        <img src="https://mayhomevn.com/storage/upload/config/TF61oxdtbrNsve8U8c9Op2nn55myEbbROlnRuoFy.png" alt="Mayhome.vn" width="160">
                    </a>
                    <ul class="nav gap-3">
                        <li class="nav-item"><a class="nav-link" href="/">{{__('Homepage')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#featured-products">{{__('Store')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#promotions">{{__('Promotion')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#gallery">{{__('Gallery')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">{{__('Contact Us')}}</a></li>
                    </ul>
                    <div class="promo-header-cta d-flex gap-2">
                        <a href="/shopping-cart/list" class="btn btn-light text-danger px-3"><i class="fas fa-shopping-bag me-1"></i>{{__('Shopping Cart')}}</a>
                        <a href="/lien-he" class="btn btn-warning text-danger px-3"><i class="fas fa-phone-volume me-1"></i>{{__('Consultation')}}</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    @php
    $bannerSlides = [
        [
            'title' => 'Xả hàng tồn kho - Ưu đãi giá sinh viên',
            'subtitle' => 'Nhằm dọn kho và chuẩn bị cho đợt hàng mới, cửa hàng triển khai chương trình xả hàng tồn kho với mức giá ưu đãi đặc biệt dành cho sinh viên và các khu dân cư lân cận. Sản phẩm còn mới, sử dụng tốt, đảm bảo chất lượng, giá bán giảm sâu, phù hợp ngân sách sinh viên',
            'image' => asset('themes/theme_1/img/product8.jpg'),
            'badge' => 'Khuyến mãi lớn nhất năm'
        ],
        [
            'title' => 'Mua tại kho - Giảm giá siêu to',
            'subtitle' => 'Cửa hàng triển khai chương trình ưu đãi đặc biệt dành cho khách mua trực tiếp tại kho. Không qua trung gian, không tốn chi phí mặt bằng, giá bán được tối ưu ở mức thấp nhất. Hàng sẵn tại kho xem trực tiếp trước khi mua - Mua càng nhiều ưu đãi càng hấp dẫn',
            'image' => asset('themes/theme_1/img/product5.jpg'),
            'badge' => 'Sản phẩm mới'
        ],
        /*[
        'title' => 'Ưu Đãi Đặc Biệt Mùa Tết',
        'subtitle' => 'Giảm giá lên đến 30% cho tất cả sản phẩm quà Tết. Miễn phí giao hàng cho đơn hàng từ 1.000.000đ. Đặt hàng ngay để nhận ưu đãi tốt nhất!',
        'image' => asset('themes/theme_1/img/product8.jpg'),
        'badge' => 'Giảm giá sốc'
        ],*/
    ];

    $serviceHighlights = [
        ['icon' => asset('themes/theme_1/img/icons/icon-freeship.ico'), 'title' => 'MIỄN PHÍ GIAO HÀNG', 'subtitle' => 'Cho đơn từ 1.000.000đ'],
        ['icon' => asset('themes/theme_1/img/icons/mua-nhiều-giảm-nhiều-icon_1.ico'), 'title' => 'MUA NHIỀU GIẢM NHIỀU', 'subtitle' => 'Giảm nhiều hơn khi mua combo'],
        ['icon' => asset('themes/theme_1/img/icons/tiết-kiệm-vượt-trội-icon.ico'), 'title' => 'TIẾT KIỆM VƯỢT TRỘI', 'subtitle' => 'Ưu đãi hơn khi mua hàng tại kho'],
        ['icon' => asset('themes/theme_1/img/icons/uy-tín-chất-lượng.ico'), 'title' => 'UY TÍN VÀ CHẤT LƯỢNG', 'subtitle' => 'Cam kết chính hãng 100%']
    ];

    $galleryItems = [
        ['image' => 'https://picsum.photos/800/600?random=9', 'title' => 'Giỏ quà Premium'],
        ['image' => 'https://picsum.photos/800/600?random=10', 'title' => 'Set quà cổ truyền'],
        ['image' => 'https://picsum.photos/800/600?random=11', 'title' => 'Combo trà & bánh'],
        ['image' => 'https://picsum.photos/800/600?random=12', 'title' => 'Set quà gia đình'],
    ];
    @endphp

    <div class="promotion-page">
        <section class="promo-hero">
            <div class="promo-hero-slider swiper">
                <div class="swiper-wrapper">
                    @foreach ($bannerSlides as $slide)
                    <div class="swiper-slide">
                        <div class="container position-relative">
                            <div class="row align-items-center g-4">
                                <div class="col-lg-7">
                                    {{-- <div class="promo-pill">
                                            <i class="fas fa-fire"></i>
                                            {{ $slide['badge'] }}
                                </div> --}}
                                <h1 class="fw-bold display-5 mt-3">{{ $slide['title'] }}</h1>
                                <p class="lead mt-3 mb-4">
                                    {{ $slide['subtitle'] }}
                                </p>
                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    <a href="#featured-products" class="btn btn-light text-danger fw-bold px-4 py-2 rounded-pill">
                                        Khám phá ngay
                                    </a>
                                    <a href="{{ route('catalog.products') }}" class="btn btn-outline-light fw-semibold px-4 py-2 rounded-pill">
                                        Xem toàn bộ sản phẩm
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 text-center">
                                <div class="promo-hero__image mx-auto">
                                    <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}" class="img-fluid rounded-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
    </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($serviceHighlights as $item)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="highlight-card d-flex align-items-start gap-3">
                        <div class="icon-wrap">
                            <img src="{{ $item['icon'] }}" width="45" />
                        </div>
                        <div>
                            <p class="fw-bold mb-1 text-uppercase small" style="color: #222;">{{ $item['title'] }}</p>
                            <p class="mb-0 text-muted" style="color: #222;">{{ $item['subtitle'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="featured-products" class="py-5">
        <div class="container">
            <div class="section-heading">
                <span class="eyebrow">Sản phẩm nổi bật</span>
                <h2>Giảm giá cuối năm</h2>
                <p class="text-muted mt-3">
                    <span class="border-solid">Ưu đãi khi mua lẻ sản phẩm</span>
                </p>
            </div>
            {{-- <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
                        <button class="tab-pill active" type="button" data-filter="all">Tất cả</button>
                        <button class="tab-pill" type="button" data-filter="sale">Giảm giá</button>
                        <button class="tab-pill" type="button" data-filter="hot">Bán chạy</button>
                        <button class="tab-pill" type="button" data-filter="new">Mới nhất</button>
                    </div> --}}
            <div class="row g-4">
                @foreach ($singleProducts as $singleProduct)
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="product-card" data-filter="">
                        <span class="badge bg-danger">{{__('Promotion')}}</span>
                        <img src="{{ asset('storage/'. $singleProduct->image) }}" alt="{{ $singleProduct->description->name }}">
                        <h5 class="fw-bold mb-1">{{ $singleProduct->description->name }}</h5>
                        <div class="mb-3">
                            <span class="price">{{ format_currency($singleProduct->price) }}</span>
                            @if ($singleProduct->original_price)
                            <span class="old-price">{{ format_currency($singleProduct->original_price) }}</span>
                            @endif
                        </div>
                        <button class="btn btn-danger w-100 rounded-pill btn-view-product" data-id="{{$singleProduct->id}}">
                            <i class="fas fa-search me-2"></i>{{__('View Detail')}}
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="promotions" class="py-5" style="background: linear-gradient(90deg,rgb(248, 245, 227),rgb(242, 239, 194));">
        <div class="container">
            <div class="section-heading">
                <span class="eyebrow">Khuyến mãi trong năm</span>
                <h2>Giảm giá cuối năm</h2>
                <p class="text-muted mt-3">
                    <span class="border-solid">Siêu ưu đãi khi mua combo</span>
                </p>
            </div>
            {{-- <div class="d-flex justify-content-center gap-3 flex-wrap mb-5 countdown-wrapper" data-countdown-target="2026-02-16T00:00:00+07:00">
                        <div class="countdown-box" data-countdown-segment="days">
                            <strong>00</strong>
                            <span>Ngày</span>
                        </div>
                        <div class="countdown-box" data-countdown-segment="hours">
                            <strong>00</strong>
                            <span>Giờ</span>
                        </div>
                        <div class="countdown-box" data-countdown-segment="minutes">
                            <strong>00</strong>
                            <span>Phút</span>
                        </div>
                        <div class="countdown-box" data-countdown-segment="seconds">
                            <strong>00</strong>
                            <span>Giây</span>
                        </div>
                    </div> --}}
            <div class="row g-4">
                @foreach ($comboProducts as $comboProduct)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="product-card">
                        <img src="{{ asset('storage/'. $comboProduct->image) }}" alt="{{$comboProduct->description->name}}">
                        <h5 class="fw-bold mb-1">{{$comboProduct->description->name}}</h5>
                        <p class="price mb-3">{{format_currency($comboProduct->price)}}</p>
                        <button class="btn btn-danger w-100 rounded-pill add-to-cart-promo" data-product-id="{{$comboProduct->id}}" data-name="{{$comboProduct->description->name}}" data-price="{{$comboProduct->price}}" data-image="{{ asset('storage/'. $comboProduct->image) }}">
                            {{__('Buy Combo')}}
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section id="gallery" class="py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <img src="https://picsum.photos/800/600?random=18" class="w-100 rounded-4 mb-4" alt="Hộp quà Tết">
                            <div class="quote-card">
                                "Chào đón năm mới, cùng trải nghiệm sản phẩm Tết độc đáo - hướng trọn niềm vui tới những người thân yêu!"
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="promo-grid row g-3">
                                @foreach ($galleryItems as $item)
                                    <div class="col-6">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
    <p class="fw-semibold mt-2 text-center">{{ $item['title'] }}</p>
    </div>
    @endforeach
    </div>
    </div>
    </div>
    </div>
    </section> --}}

    <section id="contact" class="py-5">
        <div class="container">
            <div class="cta-card">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <p class="text-uppercase fw-bold mb-2">Ưu đãi giảm đến 30%</p>
                        <h3 class="fw-bold display-6 mb-3">Xả hàng tồn kho - Ưu đãi giá sinh viên</h3>
                        <p class="mb-4">Sản phẩm chính hãng, khách hàng tin tưởng, giao hàng siêu tốc, sẵn sàng đồng hành cùng doanh nghiệp và gia đình bạn.</p>
                        <ul>
                            <li>8.2K khách hàng tin tưởng</li>
                            <li>Sản phẩm chính hãng</li>
                            <li>Voucher vàng ưu đãi</li>
                            <li>Miễn phí gói quà</li>
                        </ul>
                    </div>
                    <div class="col-lg-5 text-lg-end text-center">
                        <a href="/lien-he" class="btn btn-danger btn-lg rounded-pill px-5 py-3 fw-bold">
                            Đặt hàng ngay
                        </a>
                        <p class="mt-3 mb-0 fw-semibold">Hotline: <a href="tel:0913 702 836" class="text-danger text-decoration-none">0913 702 836</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    <!-- Shopping Cart Component -->
    <div class="bg-overlay"></div>
    <form class="shopping-cart-panel">
        <div class="btn-close"></div>
        <div class="overlay"></div>
        <h2 class="shopping-cart__heading">
            <span>Giỏ hàng</span>
        </h2>
        <div class="shopping-cart__list"></div>
        <div class="shopping-cart__buttons">
            <button class="btn btn-center btn-buy-continue">Tiếp tục mua hàng</button>
            <a href="{{ route('catalog.promotionPayment') }}" class="btn btn-center btn-checkout">
                <span class="label">Thanh toán</span>
                <span class="amount">0</span>
            </a>
        </div>
    </form>

    <div class="btn-shopping-cart">
        <span class="count">0</span>
        <img src="{{ asset('catalog/assets/img/icon/cart.png') }}" alt="">
    </div>

    <footer class="promo-footer text-white pt-5 pb-4 mt-5" style="background: linear-gradient(0deg,rgb(149, 135, 45) 0%,rgb(108, 104, 31) 60%,rgb(116, 112, 34) 100%);">
        <div class="container">
            <div class="row g-4 footer-top">
                <div class="col-md-4">
                    <h3 class="fw-bold mb-3" style="font-family:'Great Vibes', cursive;">{{__('Mayhome')}}</h3>
                    <p>Thương hiệu Chăn Ga Gối Nệm có mặt tại hơn 200 siêu thị trên toàn quốc: CoopMart, Go!, Mega Market, Emart, Lotte Mart.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-uppercase fw-bold mb-3">Thông tin liên hệ</h5>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Số 107 - Tam Đa, phường Long Trường, quận Thủ Đức, Hồ Chí Minh</p>
                    <p class="mb-2"><i class="fas fa-phone me-2"></i>0913 702 836</p>
                    <p class="mb-0"><i class="fas fa-globe me-2"></i>mayhomevn.com</p>
                </div>
                <div class="col-md-2">
                    <h5 class="text-uppercase fw-bold mb-3">Menu</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="https://mayhomevn.com/" class="text-white text-decoration-none">Trang chủ</a></li>
                        <li><a href="#featured-products" class="text-white text-decoration-none">Giới thiệu</a></li>
                        <li><a href="#featured-products" class="text-white text-decoration-none">Cửa hàng</a></li>
                        <li><a href="#gallery" class="text-white text-decoration-none">Kiến thức</a></li>
                        <li><a href="#contact" class="text-white text-decoration-none">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="text-uppercase fw-bold mb-3">Chính sách mua hàng</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#" class="text-white text-decoration-none">Chính sách đổi trả</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Chính sách bảo mật</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Chính sách vận chuyển</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Điều khoản dịch vụ</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4 pt-3 border-top border-light">
                <p class="mb-0 small text-white-50">© {{ date('Y') }} Mayhome - Món quà từ thiên nhiên. Thiết kế theo cảm hứng THWEBSHOP.</p>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productName">{{__('Product Information')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <iv class="modal-body" id="productModalBody"></div>
            </div>
        </div>
    </div>

    <input type="hidden" name="asset_path" value="{{ asset('') }}">
    <input type="hidden" id="cart-list" value="{{ route('cart.getPromotionList') }}">
    <input type="hidden" id="add-to-cart-promo" value="{{ route('cart.getAddPromotionProduct') }}">
    <input type="hidden" id="remove-cart-item" value="{{ route('cart.getRemovePromotionItem') }}">
    <input type="hidden" id="update-cart-item" value="{{ route('cart.getUpdatePromotionItem') }}">
@endsection
