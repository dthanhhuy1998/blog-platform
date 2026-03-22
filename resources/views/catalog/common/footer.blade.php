<footer class="footer bg-[#161e2d] text-[#ccc] pt-20 pb-6">
    <div class="container mx-auto px-6 md:px-10 lg:px-24 grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
        <div class="footer-col">
            <div class="logo-footer flex items-center gap-3 mb-6 justify-center md:justify-start">
                <a href="#" class="logo-footer-img">
                    <img src="{{asset('storage/'. $appLogo)}}"" alt="Logo" class="w-[180px] md:w-[220px] lg:w-[240px]" />
                </a>
            </div>

            <div class="footer-desc text-sm leading-relaxed text-[#bbb] md:text-left text-center">{!! $footerConfig['contact'] !!}</div>
        </div>

        <div class="flex md:flex-row flex-col gap-10 justify-between flex-1">
            <div class="footer-col flex-1 w-full">
                <h3 class="text-white text-lg uppercase font-bold mb-6 text-center md:text-left">{{__('Contact')}}</h3>

                <div class="flex flex-col gap-2 items-center md:items-start">
                    <p class="flex items-center gap-3 mb-3 text-[#bbb] text-center md:text-left">
                        <i class="fa-solid fa-location-dot w-[20px] shrink-0"></i>
                        <span>{{$footerConfig['address']}}</span>
                    </p>

                    <p class="flex items-center gap-3 mb-3 text-[#bbb] text-center md:text-left">
                        <i class="fa-solid fa-phone w-[20px] shrink-0"></i>
                        <span>{{$footerConfig['phone']}}</span>
                    </p>

                    <p class="flex items-center gap-3 text-[#bbb] text-center md:text-left">
                        <i class="fa-solid fa-envelope w-[20px] shrink-0"></i>
                        <span>{{$footerConfig['gmail']}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright border-t border-[rgba(255,255,255,0.08)] pt-6 text-center text-sm text-[#888] px-10">
        &copy; 2024 Bản quyền thuộc Trung tâm Sản xuất Sản phẩm Nông nghiệp và
        Thực phẩm
    </div>
</footer>
