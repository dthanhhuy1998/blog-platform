<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="{{asset('storage/'. $appFavicon)}}"  type="image/icon type">

{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
{!! JsonLd::generate() !!}

<link rel="stylesheet" href="./assets/css/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;600;700&display=swap" rel="stylesheet" />

{!! $headerScript !!}

<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['"Be Vietnam Pro"', "sans-serif"]
                , }
            , }
        , }
    , };

</script>

<style>
    body {
        font-family: "Be Vietnam Pro", sans-serif;
    }

    /* Làm các tiêu đề (Heading) sắc nét hơn */
    h1,
    h2,
    h3,
    .section-title {
        letter-spacing: -0.02em;
        font-weight: 700;
    }

</style>
</head>
