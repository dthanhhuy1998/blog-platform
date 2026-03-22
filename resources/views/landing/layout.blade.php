<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('favicon')

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    
    @foreach($styles ?? [] as $style)
        <link rel="stylesheet" href="{{ $style }}" />
    @endforeach
    @foreach($scripts ?? [] as $script)
        <script src="{{ $script }}"></script>
    @endforeach

    @stack('styles')
</head>
<body>
    @yield('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Swiper for hero banner
        const heroSwiper = new Swiper('.promo-hero-slider', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 1000,
        });

        const tabButtons = document.querySelectorAll('#featured-products .tab-pill');
        const productCards = document.querySelectorAll('#featured-products .product-card[data-filter]');

        tabButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;

                tabButtons.forEach((btn) => btn.classList.remove('active'));
                button.classList.add('active');

                productCards.forEach((card) => {
                    const cardFilter = card.dataset.filter;
                    if (filter === 'all' || cardFilter === filter) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });

        const countdownWrapper = document.querySelector('[data-countdown-target]');
        if (countdownWrapper) {
            const targetDate = new Date(countdownWrapper.dataset.countdownTarget);
            const segments = countdownWrapper.querySelectorAll('.countdown-box[data-countdown-segment]');

            const updateCountdown = () => {
                const now = new Date();
                let diff = targetDate - now;
                if (diff < 0) diff = 0;

                const seconds = Math.floor(diff / 1000);
                const timeMap = {
                    days: Math.floor(seconds / 86400),
                    hours: Math.floor((seconds % 86400) / 3600),
                    minutes: Math.floor((seconds % 3600) / 60),
                    seconds: seconds % 60
                };

                segments.forEach((segment) => {
                    const type = segment.dataset.countdownSegment;
                    const value = timeMap[type] ?? 0;
                    const strongEl = segment.querySelector('strong');
                    if (strongEl) {
                        strongEl.textContent = String(value).padStart(2, '0');
                    }
                });

                if (diff === 0) {
                    clearInterval(intervalId);
                }
            };

            updateCountdown();
            const intervalId = setInterval(updateCountdown, 1000);
        }

        // Helper functions
        function convertToVNDCurrency(number) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(number);
        }

        function assetPath(path = '') {
            const assetPath = document.querySelector('input[name="asset_path"]')?.value || '';
            return assetPath + path;
        }

        // Shopping Cart Functions
        function cartList(params) {
            $.ajax({
                url: params.url,
                method: params.method,
                dataType: 'json',
                data: params.data,
                success: function(response) {
                    if (response.status == 200) {
                        let renderCart = '';

                        if (response.data.data && Object.keys(response.data.data).length > 0) {
                            $.map(response.data.data, function(item, index) {
                                renderCart += `<div class="shoping-cart__item">
                                    <div class="btn-remove" data-id="${item.rowId}"></div>
                                    <div class="shoping-cart__item-image">
                                        <img src="${item.options.image}" alt="image">
                                    </div>
                                    <div class="shopping-cart__item-info">
                                        <div class="shopping-cart__item-info-heading">
                                            <h2>${item.name}</h2>
                                            <p>
                                                <span>SKU:</span>
                                                <span>${item.options.sku || 'N/A'}</span>
                                            </p>
                                        </div>
                                        <div class="shopping-cart__item-info-bottom">
                                            <span class="price">${convertToVNDCurrency(item.price)}</span>
                                        </div>
                                        <div class="shopping-cart-controls">
                                            <span class="minus" data-id="${item.rowId}">-</span>
                                            <input type="text" name="quantity" value="${item.qty}" quantity-max="${item.options.quantity_max || 999}" readonly>
                                            <span class="plus" data-id="${item.rowId}">+</span>
                                        </div>
                                    </div>
                                </div>`;
                            });
                        } else {
                            renderCart = '<p class="text-center text-muted mt-4">Giỏ hàng trống</p>';
                        }

                        $('.shopping-cart__list').html(renderCart);
                        $('.btn-shopping-cart .count').text(response.data.quantity_total || 0);
                        $('.btn-checkout .amount').text(convertToVNDCurrency(parseInt(response.data.price_total || 0)));
                    }
                },
                error: function(err) {
                    console.error(err);
                }
            });
        }

        function addToCartPromo(params) {
            $.ajax({
                url: params.url,
                method: params.method,
                dataType: 'json',
                data: params.data,
                beforeSend: function() {
                    $('.shopping-cart-panel .overlay').addClass('active');
                },
                success: function(response) {
                    $('.shopping-cart-panel .overlay').removeClass('active');
                    
                    if (response.status == 200) {
                        $('.bg-overlay').addClass('active');
                        $('.shopping-cart-panel').addClass('open');
                        
                        const cartParams = {
                            url: $('#cart-list').val(),
                            method: 'GET',
                            data: {},
                        };
                        cartList(cartParams);
                    } else {
                        alert(response.message || 'Có lỗi xảy ra');
                    }
                },
                error: function(err) {
                    $('.shopping-cart-panel .overlay').removeClass('active');
                    console.error(err);
                    alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng');
                }
            });
        }

        function removeItem(params) {
            $.ajax({
                url: params.url,
                method: params.method,
                dataType: 'json',
                data: params.data,
                beforeSend: function() {
                    $('.shopping-cart-panel .overlay').addClass('active');
                },
                success: function(response) {
                    $('.shopping-cart-panel .overlay').removeClass('active');

                    if (response.status == 200) {
                        const cartParams = {
                            url: $('#cart-list').val(),
                            method: 'GET',
                            data: {},
                        };
                        cartList(cartParams);
                    }
                },
                error: function(err) {
                    $('.shopping-cart-panel .overlay').removeClass('active');
                    console.error(err);
                }
            });
        }

        function updateItem(params) {
            $.ajax({
                url: params.url,
                method: params.method,
                dataType: 'json',
                data: params.data,
                beforeSend: function() {
                    $('.shopping-cart-panel .overlay').addClass('active');
                },
                success: function(response) {
                    $('.shopping-cart-panel .overlay').removeClass('active');

                    if (response.status == 200) {
                        const cartParams = {
                            url: $('#cart-list').val(),
                            method: 'GET',
                            data: {},
                        };
                        cartList(cartParams);
                    }
                },
                error: function(err) {
                    $('.shopping-cart-panel .overlay').removeClass('active');
                    console.error(err);
                }
            });
        }

        // Initialize cart list
        const cartParams = {
            url: $('#cart-list').val(),
            method: 'GET',
            data: {},
        };
        cartList(cartParams);

        // Close shopping cart modal
        $('body').on('click', '.shopping-cart-panel .btn-close, .bg-overlay', function () {
            $('.bg-overlay').removeClass('active');
            $('.shopping-cart-panel').removeClass('open');
        });

        // Buy continue
        $('body').on('click', '.btn-buy-continue', function (e) {
            e.preventDefault();
            $('.bg-overlay').removeClass('active');
            $('.shopping-cart-panel').removeClass('open');
        });

        // Click btn cart to show
        $('.btn-shopping-cart').on('click', function() {
            $('.bg-overlay').addClass('active');
            $('.shopping-cart-panel').addClass('open');
        });

        // Add to cart for promotion products
        $('body').on('click', '.add-to-cart-promo', function() {
            const $btn = $(this);
            const product_id = $btn.data('product-id');
            const name = $btn.data('name');
            const price = $btn.data('price');
            const image = $btn.data('image');

            const params = {
                url: $('#add-to-cart-promo').val(),
                method: 'GET',
                data: {
                    product_id: product_id,
                    name: name,
                    price: price,
                    quantity: 1,
                    image: image,
                }
            };

            addToCartPromo(params);
        });

        // Remove item
        $('body').on('click', '.shoping-cart__item .btn-remove', function() {
            const params = {
                url: $('#remove-cart-item').val(),
                method: 'GET',
                data: {
                    row_id: $(this).data('id')
                }
            };
            removeItem(params);
        });

        // Update item quantity
        $('body').on('click', '.shopping-cart-controls .plus', function() {
            const rowId = $(this).data('id');
            const quantity = parseInt($(this).siblings('input[name="quantity"]').val()) + 1;
            const quantityMax = $(this).siblings('input[name="quantity"]').attr('quantity-max');

            if (quantity > parseInt(quantityMax)) {
                alert('Đã đạt tối đa số lượng!');
                return;
            }

            const params = {
                url: $('#update-cart-item').val(),
                method: 'GET',
                data: {
                    row_id: rowId,
                    quantity: quantity
                }
            };
            updateItem(params);
        });

        $('body').on('click', '.shopping-cart-controls .minus', function() {
            const rowId = $(this).data('id');
            const quantity = parseInt($(this).siblings('input[name="quantity"]').val()) - 1;

            if (quantity < 1) {
                alert('Chọn ít nhất 1 sản phẩm!');
                return;
            }

            const params = {
                url: $('#update-cart-item').val(),
                method: 'GET',
                data: {
                    row_id: rowId,
                    quantity: quantity
                }
            };
            updateItem(params);
        });

        $(document).on('click', '.btn-view-product', function () {
            let productModal = $('#productModal');
            let productId = $(this).data('id');

            $.ajax({
                url: `/pages/product/show/${productId}`,
                type: 'GET',
                dataType: 'json',
                beforeSend() {
                     $('#productModalBody').html('<p>Đang tải...</p>');
                },
                success(res) {
                    $('#productModalBody').html(res.data);

                    new Swiper('.productSwiper', {
                        loop: true,
                        pagination: { el: '.swiper-pagination' },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });

                    productModal.modal('show');
                },
                error(xhr) {
                    alert('Không tải được sản phẩm');
                }
            });
        });

        // Tăng giảm số lượng ở popup
        $(document).on('click', '#productModal .btn-qty-plus', function () {
            let input = $(this).siblings('.product-qty');
            let qty = parseInt(input.val()) || 1;
            input.val(qty + 1);
        });

        $(document).on('click', '#productModal .btn-qty-minus', function () {
            let input = $(this).siblings('.product-qty');
            let qty = parseInt(input.val()) || 1;

            if (qty > 1) {
                input.val(qty - 1);
            }
        });

        $(document).on('click', '#productModal .btn-add-to-cart', function () {
            let qty = $('#productModal .product-qty').val();
            let productId = $('#productModal input[name="product_id"]').val();
            let productName = $('#productModal input[name="product_name"]').val();
            let productPrice = $('#productModal input[name="product_price"]').val();
            let productImage = $('#productModal input[name="product_image"]').val();

            const params = {
                url: $('#add-to-cart-promo').val(),
                method: 'GET',
                data: {
                    product_id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: parseInt(qty),
                    image: productImage,
                }
            };
            
            addToCartPromo(params);
        }); 
    });
</script>
    @stack('scripts')
</body>
</html>

