<header
    class=" top-0 left-0 w-full z-[1000] transition-all duration-300
    {{ request()->routeIs('catalog.product') ? 'force-white bg-white shadow-md sticky' : 'bg-transparent header fixed' }}"
>    
<div class="container mx-auto px-6 lg:px-24">
        <div class="header-content flex items-center justify-between py-4">
            <!-- Logo -->
            <a href="{{route('catalog.homepage')}}" class="logo lg:w-[100px] w-[70px] sm:w-[80%] md:w-[90%]">
                <img src="{{asset('storage/'. $appLogo)}}" alt="Logo" class="w-full" />
            </a>

            <!-- Navbar Desktop -->
            <nav class="navbar hidden md:flex gap-8">
                @if(count($menus) > 0)
                    @foreach($menus as $menu)
                        <a href="{{$menu->link}}" target="{{ $menu->target }}" class="font-bold text-sm uppercase text-[#333] hover:text-[#1a5d2b] transition-colors duration-300">
                            {{ $menu->name }}
                        </a>
                    @endforeach
                @endif
            </nav>

            <!-- Search Desktop -->
            <div class="search-box hidden md:flex items-center border border-[#ddd] rounded-full px-4 py-2 w-[250px] bg-white">
                <input type="text" placeholder="Tìm kiếm..." class="flex-1 outline-none border-none text-sm text-[#555]" />
                <button class="text-[#f16543] text-lg">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            <!-- Mobile Menu Icon -->
            <button id="menu-btn" class="md:hidden text-2xl text-[#333]">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="menu-overlay" class="fixed inset-0 bg-black/50 z-[999] hidden opacity-0 transition-opacity duration-300"></div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-[80%] bg-white z-[1000] shadow-2xl translate-x-full transition-transform duration-300 ease-in-out">
        <div class="p-6">
            <div class="flex justify-end mb-6">
                <button id="close-menu" class="text-2xl text-[#333]">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <nav class="flex flex-col gap-4">
                @if(count($menus) > 0)
                    @foreach($menus as $menu)
                        <a href="{{$menu->link}}" target="{{ $menu->target }}" class="font-bold text-base uppercase text-[#333] py-3 border-b border-[#eee]">
                            {{ $menu->name }}
                        </a>
                    @endforeach
                @endif

                <div class="mt-6 flex items-center border border-[#ddd] rounded-full px-4 py-2">
                    <input type="text" placeholder="Tìm kiếm..." class="flex-1 outline-none text-sm text-[#555]" />
                    <button class="text-[#f16543]">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </nav>
        </div>
    </div>
</header>
