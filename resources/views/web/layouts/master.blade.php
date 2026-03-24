<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('frontend/favicon.ico')}}">
    
    {!! SEO::generate() !!}

    <!-- Boostrap 5.3 -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
</head>

<body>
    <div id="wrapper">
        @include('web.layouts.header')
        <main class="content">
            @yield('content')
        </main>
        @include('web.layouts.footer')
    </div>

    <!-- Jquery 4.0.0 -->
    <script src="{{ asset('frontend/vendor/jquery/jquery-4.0.0.js') }}"></script>
    <!-- Boostrap 5.3 -->
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <!-- Search Overlay -->
    <div id="search-overlay" class="search-overlay">
        <button class="search-overlay__close" id="search-close">&times;</button>
        <div class="search-overlay__content">
            <form action="#" class="search-overlay__form">
                <input type="text" class="search-overlay__input" placeholder="Search for everything..." autocomplete="off" autofocus>
                <div class="search-overlay__line"></div>
                <p class="search-overlay__hint">Press ESC to close</p>
            </form>
        </div>
    </div>
</body>

</html>