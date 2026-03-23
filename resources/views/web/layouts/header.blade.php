<header class="header">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="./" class="header-wrapper__logo-link">
                    <img src="{{ asset('frontend/assets/images/logo.png') }}" class="header-wrapper__logo-img" alt="">
                </a>
            </div>
            <div class="header-wrapper__menu">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Featured</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="navigate">
                <div class="navigate-icon">
                    <a href="#" onclick="return false;" class="navigate-icon__item" id="search-trigger">
                        <img src="{{ asset('frontend/assets/images/icons/search.svg') }}" alt="Search Icon">   
                    </a>
                        <a href="#" onclick="return false;" class="navigate-icon__item" id="menu-trigger">
                        <img src="{{ asset('frontend/assets/images/icons/bar.svg') }}" alt="Bar icon">    
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>