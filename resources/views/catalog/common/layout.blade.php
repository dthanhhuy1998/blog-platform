<!doctype html>
<html lang="vi">
<head>
    @include('catalog.common.head')
</head>
<body>
    <!-- point chức năng scroll to Top -->
    <div id="top"></div>

    <!-- header -->
    @include('catalog.common.header')

    <!-- content -->
    <div class="container-fuild wrapper">
        @yield('content')
    </div>

    <!-- footer -->
    @include('catalog.common.footer')

    <div class="flex flex-col gap-4 fixed bottom-8 right-8 z-[1500]">
        @if(config('site.layout.float_icons'))
        	@foreach(config('site.layout.float_icons') as $floatIcons)
				<a href="{{$floatIcons['value']}}" class="group" title="{{$floatIcons['title']}}" target="{{$floatIcons['target']}}">
					<div class="relative w-12 h-12 rounded-full flex items-center justify-center shadow-lg
						bg-[#1877f2]
						transition-all duration-300
						group-hover:scale-110
						group-hover:shadow-xl">
						{!!$floatIcons['icon']!!}

						<!-- ripple -->
						<span class="absolute inset-0 rounded-full border-2 border-[#1877f2]
						opacity-0 scale-100
						group-hover:opacity-100 group-hover:scale-125
						transition-all duration-300"></span>
					</div>
				</a>
			@endforeach
        @endif

        <a href="#top">
            <div id="scroll-to-top" class="relative w-12 h-12 rounded-full flex items-center justify-center shadow-lg" style="
            background: conic-gradient(
              rgb(24, 44, 103) 99%,
              rgb(215, 215, 215) 99%
            );
          ">
                <i class="fa-solid fa-arrow-up text-white z-10"></i>
                <span class="absolute w-[42px] h-[42px] rounded-full bg-[#182c67] z-0"></span>
            </div>
        </a>
    </div>

    @include('catalog.common.scripts')
    <script>
        lucide.createIcons();

    </script>
    <script>
        AOS.init();
        const header = document.querySelector(".header");

        window.addEventListener("scroll", function() {
            if (window.scrollY > 150) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
        var swiper = new Swiper(".mySwiper", {
            loop: true, // chạy vòng lặp
            autoplay: {
                delay: 2500, // tự chạy 2.5s
            }
            , navigation: {
                nextEl: ".swiper-button-next"
                , prevEl: ".swiper-button-prev"
            , }
        , });

        window.addEventListener("scroll", function() {
            if (window.scrollY > 50) {
                document
                    .querySelector(".header")
                    .classList.add("fixed", "bg-white", "shadow-md");
                document.querySelector(".header").classList.remove("absolute");
            } else {
                document
                    .querySelector(".header")
                    .classList.remove("fixed", "bg-white", "shadow-md");
                document.querySelector(".header").classList.add("absolute");
            }
        });
        const menuBtn = document.getElementById("menu-btn");
        const closeMenu = document.getElementById("close-menu");
        const mobileMenu = document.getElementById("mobile-menu");
        const menuOverlay = document.getElementById("menu-overlay");

        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.remove("translate-x-full");
            mobileMenu.classList.add("translate-x-0");

            menuOverlay.classList.remove("hidden");
            menuOverlay.classList.add("block", "opacity-100");
        });

        const closeSidebar = () => {
            mobileMenu.classList.remove("translate-x-0");
            mobileMenu.classList.add("translate-x-full");

            menuOverlay.classList.remove("block", "opacity-100");
            menuOverlay.classList.add("opacity-0");

            setTimeout(() => {
                menuOverlay.classList.add("hidden");
            }, 300);
        };

        closeMenu.addEventListener("click", closeSidebar);
        menuOverlay.addEventListener("click", closeSidebar);

    </script>

    <script>
        const productSwiper = new Swiper(".productSwiper", {
            loop: true
            , spaceBetween: 20
            , slidesPerView: 1.3
            , slidesPerGroup: 1
            , breakpoints: {
                768: {
                    slidesPerView: 3
                }
                , 1024: {
                    slidesPerView: 4
                }
            , }
            , navigation: {
                nextEl: ".swiper-button-next"
                , prevEl: ".swiper-button-prev"
            , }
        , });

    </script>
</body>
</html>
