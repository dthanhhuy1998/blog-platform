@extends('catalog.common.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-5">
    <!-- TOP SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-2 md:gap-20 gap-10 lg:mb-20 md:mb-10 mb-8 items-stretch">
        <!-- GALLERY -->
        <div class="flex justify-center lg:justify-start">
            <div class="w-full space-y-6">
                <!-- MAIN IMAGE -->
                <div class="bg-white rounded-2xl overflow-hidden border relative">
                    <img id="mainImage" src="{{asset('storage/'. $productDescription->product->image)}}" class="w-full h-[400px] object-cover" alt="Product" />
                </div>

                <!-- THUMBNAILS -->
                {{-- <div class="grid grid-cols-4 gap-4">
                    <img onclick="changeImage(this)" src="https://picsum.photos/seed/wine1/800/800" class="thumb active-thumb" />
                    <img onclick="changeImage(this)" src="https://picsum.photos/seed/wine2/800/800" class="thumb" />
                    <img onclick="changeImage(this)" src="https://picsum.photos/seed/wine3/800/800" class="thumb" />
                    <img onclick="changeImage(this)" src="https://picsum.photos/seed/wine4/800/800" class="thumb" />
                </div> --}}
            </div>
        </div>

        <!-- INFO -->
        <div class="border border-[#f16543] md:p-8 p-4 rounded-2xl">
            @foreach($productDescription->product->toCategory as $category)
                <div class="text-white bg-[#1a5d2b] py-2 px-4 w-fit font-bold uppercase tracking-widest text-[10px] mb-5 rounded-full">{{$category->name}}</div>
            @endforeach

            <h1 class="text-3xl font-bold mb-6">{{$category->title}}</h1>

            <div class="text-xl font-bold mb-6 text-[#f16543]">{{number_format($productDescription->product->price)}} VNĐ</div>

            <div class="inline-flex items-center gap-2 bg-green-50 text-sm text-green-700 px-3 py-1 rounded-lg mb-6">
                ✔ Còn hàng
            </div>

            <div class="mb-8 text-md">{!!$productDescription->description!!}</div>

            <a href="https://zalo.me/4405521331102056766" target="_blank" class="w-full bg-orange-600 text-white py-4 rounded-lg font-bold hover:bg-orange-700 transition flex justify-center items-center gap-3">
                <i data-lucide="shopping-cart" class="my-class"></i> {{__('Contact to order')}}
            </a>
        </div>
    </div>

    <!-- TABS -->
    <div class="bg-white rounded-xl md:p-8 p-4 border">
        <div class="flex gap-8 border-b mb-6">
            <h2 class="tab active-tab font-bold uppercase text-2xl text-[#f16543] pb-2">{{__('Desciption')}}</h2>
        </div>

        <div class="">{!!$productDescription->detail!!}</div>
    </div>
</div>

<script>
    lucide.createIcons();

    function changeImage(el) {
        document.getElementById("mainImage").src = el.src;
        document
            .querySelectorAll(".thumb")
            .forEach((t) => t.classList.remove("active-thumb"));
        el.classList.add("active-thumb");
    }

    function openTab(id) {
        document
            .querySelectorAll(".tab-content")
            .forEach((t) => t.classList.add("hidden"));
        document.getElementById(id).classList.remove("hidden");

        document
            .querySelectorAll(".tab")
            .forEach((b) => b.classList.remove("active-tab"));
        event.target.classList.add("active-tab");
    }
</script>
@endsection