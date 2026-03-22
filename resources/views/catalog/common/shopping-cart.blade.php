<form class="shopping-cart-panel">
    <div class="btn-close"></div>
    <div class="overlay"></div>
    <h2 class="shopping-cart__heading">
        <span>Giỏ hàng</span>
    </h2>
    <div class="shopping-cart__list"></div>
    <div class="shopping-cart__buttons">
        <button class="btn btn-center btn-buy-continue">Tiếp tục mua hàng</button>
        <a href="{{ route('catalog.payment') }}" class="btn btn-center btn-checkout">
            <span class="label">Thanh toán</span>
            <span class="amount">0</span>
        </a>
    </div>
</form>

<div class="btn-shopping-cart">
    <span class="count">0</span>
    <img src="{{ asset('catalog/assets/img/icon/cart.png') }}" alt="">
</div>