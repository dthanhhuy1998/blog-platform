<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-tranditional.dtd">
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv = “Content-Type" content = “text / html; charset = ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="author" content="Thanh Huy Developer">
    <meta name="revisit-after" content="10 days"/>

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <!-- Favicons -->
    <link href="{{asset('public/catalog/nemcstn/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('public/catalog/nemcstn/assets/img/favicon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('public/catalog/nemcstn/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/catalog/nemcstn/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('public/catalog/nemcstn/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/catalog/nemcstn/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('public/catalog/nemcstn/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/catalog/nemcstn/assets/vendor/glightbox/css/glightbox.css')}}" rel="stylesheet">
    <!-- Venobox -->
    <link href="{{asset('public/catalog/nemcstn/assets/vendor/venobox/venobox.min.css')}}" rel="stylesheet">
    <!-- Swiper -->
    <link href="{{asset('public/catalog/nemcstn/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('public/catalog/nemcstn/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/catalog/nemcstn/assets/css/mayhome.css')}}" rel="stylesheet">
    
</head>

<body>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "107863991403478");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1 class="text-light">
                <a href="{{ route('catalog.homepage') }}">
                    <img src="{{ asset('public/catalog/nemcstn/assets/img/Logo P.A.N.png') }}" alt="logo P.A.N">
                </a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="active " href="{{ route('catalog.homepage') }}">TRANG CHỦ</a></li>
                <li><a href="#introduce">NỆM CAO SU THIÊN NHIÊN</a></li>
                <li><a href="#why">LÝ DO MUA NỆM</a></li>
                <li><a href="#special">NÉT ĐẶC TRƯNG</a></li>
                <li><a href="#guarantee">BẢO HÀNH</a></li>
                <li><a href="#footer">LIÊN HỆ</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown"><span>P.A.N</span> TRAO CHẤT LƯỢNG – NHẬN NIỀM TIN</h2>
                    <p class="animate__animated animate__fadeInUp">MayHome chính thức đạt thêm bước tiến về việc nâng cao tiêu chuẩn Chất lượng và An toàn cho sản phẩm Gối / Nệm / Bộ trải,… CAO SU THIÊN NHIÊN</p>
                    <a href="#introduce" class="btn-get-started animate__animated animate__fadeInUp">Xem thêm</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <section class="features" id="introduce">
            <div class="container">
                <div class="section-title">
                    <h2 style="text-transform: uppercase;">nệm cao su thiên nhiên  7 zones massage</h2>
                    <p>
                        Với sự nghiêm túc nghiên cứu, đúc kết kinh nghiệm, tìm tòi và học hỏi. P.A.N nhận thấy được lợi ích to lớn của cao su thiên nhiên đối với giấc ngủ của mọi người, mọi nhà; Cũng như sự hạn chế của thị trường vì mức giá thành quá cao.
                    </p>
                </div>
                <div class="row mt-3" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="{{asset('public/catalog/nemcstn/assets/img/nem-cao-su.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7">
                        <h3 style="font-size: 18px; line-height: 30px;">
                            <b>P.A.N Vì 1 sứ mệnh:</b> <span style="font-style: italic;">“Mang sản phẩm CAO SU THIÊN NHIÊN CHẤT LƯỢNG đến gần hơn, hợp túi tiền hơn với tất cả NTD Việt Nam”</span>
                        </h3>
                        <ul>
                            <li><i class="bi bi-check"></i> Nguồn gốc nguyên liệu từ nhựa cây <b>cao su thiên nhiên chất lượng cao</b>, không pha lẫn tạp chất và sản xuất trên quy trình chất lượng, hiện đại.</li>
                            <li><i class="bi bi-check"></i> Được kiểm duyệt và đạt chứng nhận chất lượng kiểm định của <b>Công ty Cổ phần Giám Định khử trùng Việt Nam</b> (Vietnamcontrol) và <b>SGS</b> Quốc tế.</li>
                            <li><i class="bi bi-check"></i> Đạt <b>Chứng nhận Oeko-tex Standard 100 toàn cầu</b>.</li>
                            <li><i class="bi bi-check"></i> Sản phẩm chất lượng - an toàn - thân thiện với người dùng và môi trường, Tuổi thọ nệm rất cao, trung bình từ 10 đến 20 năm vẫn rất tốt và không cần thay thế.</li>
                            <li><i class="bi bi-check"></i> Nệm nâng đỡ tối ưu, Tạo lực nâng đỡ đường cong của cơ thể; hỗ trợ tốt cho cột sống, nhất là đối với người có tiền sử về bệnh đau cột sống, thoái vị đĩa đệm.</li>
                            <li><i class="bi bi-check"></i> <b>Thiết kế 2 mặt đều là lỗ nhỏ</b>, Một mặt classic – một mặt nâng cấp tính năng Massage. Tạo cảm giác ngủ thoáng mát, hiệu quả hút ẩm và lưu thông không khí tốt.</li>
                            <li><i class="bi bi-check"></i> Tuyệt đối không gây tác động trở mình khi nằm: Nệm mềm mại, đàn hồi cực tốt, tuyệt đối không phát ra tiếng động khó chịu dù xoay người hay ngồi dậy.</li>
                            <li><i class="bi bi-check"></i> Nệm hoàn toàn <b>nằm được 2 mặt</b> “Classic hoặc Massage”.</li>
                            <li><i class="bi bi-check"></i> Thành phần: 90% Ruột nệm là cao su thiên nhiên và 10% Vỏ nệm là Vải lưới.</li>
                            <li><i class="bi bi-check"></i> Đặt tính kỹ thuật: Formaldehyt (mg/kg) <= 75% - Amin thơm (mg/kg) <= 30%</li>
                            <li><i class="bi bi-check"></i> Kích thước: 160x200x5/10cm và 180x200x5/7.5/10cm</li>
                            <li><i class="bi bi-check"></i> Sản phẩm đạt Tiêu chuẩn cơ sở: <span style="font-style: italic;">TCSC 01:2023/PAN-Xuất xứ Trung Quốc</span></li>
                            <li><i class="bi bi-check"></i> Sản phẩm của:<b>Công ty TNHH Sản Xuất Thương Mại Phát An Nhiên</b></li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Why Us Section ======= -->
        <section class="services section-bg" id="why">
            <div class="container">
                <div class="section-title">
                    <h2 style="text-transform: uppercase;">Tại sao bạn nên chọn mua nệm cao su thiên nhiên 7 zones massage?</h2>
                    <p></p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3 col-xs-12" data-aos="fade-up">
                        <div class="icon-box icon-box-pink">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">PHIÊN BẢN ĐẶC BIỆT</a></h4>
                            <p class="description">
                                Hàng ngàn lỗ thông hơi <br/>
                                Khả năng đàn hồi cực tốt <br/>
                                Nguồn gốc CSTN chất lượng cao 
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xs-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box icon-box-cyan">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">OEKO-TEX 100 TOÀN CẦU</a></h4>
                            <p class="description">
                                Chứng nhận đáng tin cậy <br/>
                                Kiểm nghiệm theo TC nghiêm ngặt <br/>
                                Tiêu chuẩn Chất Lượng và An toàn
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box icon-box-green">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="#">DẪN ĐẦU VỀ XU HƯỚNG</a></h4>
                            <p class="description">
                                Cải tiến ở khâu “đóng gói"<br/>
                                Áp dụng công nghệ cắt 7 zones <br/>
                                Hạt Massage điểm nhấn nổi bật
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class="bx bx-infinite"></i></div>
                            <h4 class="title"><a href="#">NẰM ĐƯỢC CẢ 2 MẶT</a></h4>
                            <p class="description">
                                Hai mặt đều là lỗ nhỏ <br>
                                Thiết kế một mặt Classic <br/>
                                Nâng cấp tính năng Massage
                            </p>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End Why Us Section Section -->

        <!-- ======= Gallery Section ======= -->
        <section class="why-us" data-aos="fade-up" date-aos-delay="200" id="special">
            <div class="section-title">
                <h2 style="text-transform: uppercase;">Nét đặc trưng của sản phẩm</h2>
                <p>Nệm cao su thiên nhiên 7 Zones Massage - Tinh hoa từng điểm chạm</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 video-box">
                        <img src="{{ asset('public/catalog/nemcstn/assets/img/share-thumbnail.png') }}" class="w-100" alt="image alt"/>
                        <a class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true" data-ratio="full" data-vbtype="video" href="{{ asset('public/catalog/nemcstn/assets/media/video.mp4') }}"></a>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-check-square"></i></div>
                            <h4 class="title"><a href="">Nâng cao tiêu chuẩn</a></h4>
                            <p class="description">Chính thức đạt thêm bước tiến về việc nâng cao tiêu chuẩn Chất lượng và An toàn cho sản phẩm “Oeko-tex Standard 100 toàn cầu"</p>
                        </div>
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-chevrons-up"></i></div>
                            <h4 class="title"><a href="">Cải tiến đóng gói</a></h4>
                            <p class="description">Cải tiến khâu “Đóng gói" bằng máy cuộn nệm. Nệm trở nên gọn gàng, tiết kiệm không gian vận chuyển và trưng bày. Dễ dàng giao hàng trong khu vực đường hẹp, nhà cao tầng,...</p>
                        </div>
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-checkbox-square"></i></div>
                            <h4 class="title"><a href="">Cao su nguyên khối</a></h4>
                            <p class="description">Cao su thiên nhiên nguyên khối và xử lý qua công nghệ khử mùi tối ưu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery Section -->

        <!-- ======= Form Section ======= -->
        <div class="form-landing" data-aos="fade-up" id="guarantee">
            <div class="section-title">
                <h2 style="text-transform: uppercase;">THÔNG TIN BẢO HÀNH NỆM CAO SU THIÊN NHIÊN 7 ZONES MASSAGE</h2>
                <p></p>
            </div>
            <div class="container">
                <div class="row flex-xs-reverse">
                    <div class="col-lg-7 col-md-6 col-xs-12">
                        <div class="guarantee-content">
                            <h4>Thời gian bảo hành 10 năm tính từ ngày Qúy khách hàng mua sản phẩm nệm CSTN 7 Zones Massage tại các hệ thống bán hàng của P.A.N Trên toàn quốc.</h4>
                            <div class="case">
                                <p class="bold">Trường hợp được bảo hành:</p>
                                <ul class="list-note">
                                    <li>
                                        <i class="bx bx-check-square icon-green"></i>
                                        <span>Nệm Nệm không đàn hồi, xẹp lún, biến dạng không trở về hình dạng ban đầu.</span>
                                    </li>
                                    <li>
                                        <i class="bx bx-check-square icon-green"></i>
                                        <span>Nệm bị chảy nhựa CSTN hay bị vụn vỡ.</span>
                                    </li>
                                </ul>
                                <p class="bold">Trường hợp không được bảo hành:</p>
                                <ul class="list-note">
                                    <li>
                                        <i class="bx bx-x icon-red"></i>
                                        <span>Nệm ngả màu vàng "vàng tự nhiên của CSTN".</span>
                                    </li>
                                    <li>
                                        <i class="bx bx-x icon-red"></i>
                                        <span>Sử dụng nệm không đúng như "Hướng dẫn sử dụng và Khuyến Cáo".</span> 
                                    </li>
                                    <li>
                                        <i class="bx bx-x icon-red"></i>
                                        <span>Nệm bị lão hóa vì phơi nắng “Đặc tính của CSTN sẽ bị lão hóa dưới tác động của tia cực tím trong sáng mặt trời".</span>
                                    </li>
                                    <li>
                                        <i class="bx bx-x icon-red"></i>
                                        <span>Thức ăn, chất tẩy rửa, hóa chất, chất tẩy rửa,… bị đổ vào nệm, làm dơ bẩn nệm.</span>
                                    </li>
                                    <li>
                                        <i class="bx bx-x icon-red"></i>
                                        <span>Bảo quản nệm trong điều kiện nhiệt độ không vượt quá 40 độ C/104F trong thời gian kéo dài.</span>
                                    </li>
                                    <li>
                                        <i class="bx bx-x icon-red"></i> 
                                        <span>Bị tác động bởi những vật nhọn hoặc tải trọng quá cỡ tác động phá vỡ kết cấu nệm.</span>
                                    </li>
                                    <li>
                                        <i class="bx bx-x icon-red"></i>
                                        <span>Nệm có mùi hương nhẹ "Đó là đặc trưng của nệm có nguồn gốc từ CSTN".</span>
                                    </li>
                                </ul>
                                <p class="bold">Hướng dẫn sử dụng và khuyến cáo:</p>
                                <ul class="list-note pd-none">
                                    <li>
                                        <span>1. Không giặt ruột nệm. Không dùng chất tẩy, rửa nệm.</span>
                                    </li>
                                    <li> 
                                        <span>2. Khi cần vệ sinh, dùng khăn ướt lau sạch vết bẩn sau đó lại lau bằng khăn khô.</span> 
                                    </li>
                                    <li>
                                        <span>3. Bảo quản sản phẩm ở nơi khô ráo, thoáng mát.</span>
                                    </li>
                                    <li>
                                        <span>4. Không phơi nệm trực tiếp dưới ánh nắng mặt trời.</span>
                                    </li>
                                    <li>
                                       <span>5. Không để nệm tiếp xúc gần với nguồn nhiệt cao.</span>
                                    </li>
                                    <li>
                                        <span>6. Không ủi/ là trên nệm.</span>
                                    </li>
                                    <li>
                                        <span>7. Không dùng ngoại lực giặt các điểm massage.</span>
                                    </li>
                                    <li>
                                        <span>8. Nên dùng thiết bị bảo vệ nệm như: tấm bảo vệ nệm hay ga nệm và thay ga nệm thường xuyên.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-xs-12">
                        <form action="{{ route('catalog.postAddGuarantee') }}" method="POST" enctype="multipart/form-data" id="guarantee-form">
                            @csrf
                            <p class="form-desc text-center mb-3">
                                Vì Quyền lợi lâu dài của Qúy khách hàng. Để phục vụ Quý khách hàng nhanh chóng và cung cấp dịch vụ tốt hơn. <br/>
                                P.A.N rất mong Qúy khách hàng điền thông tin sau đây để kích hoạt bảo hành:
                            </p>
                            <div class="form-group">
                                <span class="label">Họ và tên</span>
                                <input type="text" class="form-control form-height" placeholder="Nhập họ và tên" name="name">
                                <label class="error name_error"></label>
                            </div>
                            <div class="form-group">
                                <span class="label">Số điện thoại người mua</span>
                                <input type="number" class="form-control form-height" placeholder="Nhập số điện thoại" name="phoneNumber">
                                <label class="error phoneNumber_error"></label>
                            </div>
                            <div class="form-group">
                                <span class="label">Email</span>
                                <input type="email" class="form-control form-height" placeholder="tennguoidung@gmail.com" name="email">
                                <label class="error email_error"></label>
                            </div>
                            <div class="form-group">
                                <span class="label">Mua tại hệ thống</span>
                                <input type="text" class="form-control form-height" placeholder="Nhập tên hệ thống" name="systemName">
                                <label class="error systemName_error"></label>
                            </div>
                            <div class="form-group">
                                <span class="label">Loại nệm mua</span>
                                <select name="productName" class="form-control form-solid form-height">
                                    <option value="">-- Chọn loại nệm --</option>
                                    <option value="160x200x5cm">Loại 160x200x5cm</option>
                                    <option value="160x200x10cm">Loại 160x200x10cm</option>
                                    <option value="180x200x5cm">Loại 180x200x5cm</option>
                                    <option value="180x200x7.5cm">Loại 180x200x7.5cm</option>
                                    <option value="180x200x10cm">Loại 180x200x10cm</option>
                                </select>
                                <label class="error productName_error"></label>
                            </div>
                            <div class="form-group">
                                <span class="label">Hình ảnh bill hóa đơn</span>
                                <div class="bill-image">
                                    <img src="{{ asset('public/catalog/nemcstn/assets/img/default-img.gif') }}" class="w-100" alt="image" id="bill-preview">
                                </div>
                                <input type="file" class="form-control" onchange="preview(event, 'bill-preview');" name="image">
                                <label class="error image_error"></label>
                            </div>
                            <div class="form-group">
                                <span class="label">Chú thích</span>
                                <textarea name="note" class="form-control" rows="5" placeholder="Lý do cần bảo hành"></textarea>
                                <label class="error note_error"></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button-send"> Gửi thông tin</button>
                            </div>
                            <p class="form-desc text-center mt-2">Thông tin của Quý khách luôn được bảo mật. Trân trọng!</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Section -->

        <!-- ======= Gallery Section ======= -->
        <div class="maps" data-aos="fade-up">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5621.496252179857!2d106.6369593689696!3d10.713398724408144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e1b3032c129%3A0x93edc3e475a7c7ca!2zNjkgxJDGsOG7nW5nIDUsIFBob25nIFBow7osIELDrG5oIENow6FuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1678868745197!5m2!1svi!2s" width="100%" height="308" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- Gallery Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Danh mục sản phẩm</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://mayhomevn.com/danh-muc/goi-cao-su-thien-nhien" target="_blank">Gối cao su thiên nhiên</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://mayhomevn.com/danh-muc/tam-trai" target="_blank">Tấm trải</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://mayhomevn.com/danh-muc/bo-trai" target="_blank">Bộ trải</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://mayhomevn.com/danh-muc/goi-foam-gel-flamingo" target="_blank">Gối Foam Gel/ Flamingo</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://mayhomevn.com/danh-muc/nem-da-nang" target="_blank">Nệm cao su thiên nhiên</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="https://mayhomevn.com/danh-muc/chan-men-bo-drap" target="_blank">Chăn / Mền / Bộ Drap</a></li>
                    </ul>
                </div>
    
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Bài viết mới nhất</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">P.A.N TUYỂN DỤNG NHÂN VIÊN KHO</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">P.A.N TUYỂN DỤNG NHÂN VIÊN KẾ TOÁN</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">CHÚC MỪNG NĂM MỚI CÙNG P.A.N 2023</a></li>
                    </ul>
                </div>
    
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Liên hệ chúng tôi</h4>
                    <p>
                        Nhà 69, đường số 5,  <br>
                        KDC Conic, Xã Phong Phú, Huyện Bình Chánh<br>
                        Tp. Hồ Chí Minh<br><br>
                        <strong>Phone:</strong> 0913.702.836<br>
                        <strong>Email:</strong> pan.openyourworld@gmail.com<br>
                    </p>
                    <p class="mt-1">
                        <img src="https://b-f49-zpg-r.zdn.vn/8240138407670001923/822678ff5a23877dde32.jpg" width="120" alt="qr-code"/>
                    </p>
                </div>
    
                <div class="col-lg-3 col-md-6 footer-info">
                    <h3>Thông tin liên hệ</h3>
                    <p>Công ty TNHH SX - TM PHÁT AN NHIÊN</p>
                    <p>
                        Số giấy chứng nhận ĐKDN: 0314258962. <br/>
                        Đăng ký lần đầu: 01/03/2017. <br/>
                        Ngày đăng ký thay đổi gần nhất: 19/01/2022 <br/>
                        Cơ quan cấp: <br/>
                        Sở kế hoạch và đầu tư thành phố Hồ Chí Minh. <br/>
                        Hỗ trợ doanh nghiệp: 0939.258.383 <br/>
                        Hỗ trợ và CSKH: 0913.702.836
                    </p>
                    <div class="social-links mt-3">
                        <a href="tel:0939258383" class="twitter"><i class="bx bx-phone"></i></a>
                        <a href="maito:pan.openyourworld@gmail.com" class="gmail"><i class="bx bxl-gmail"></i></a>
                        <a href="https://www.facebook.com/mayhomepan" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.youtube.com/@mayhome-monquatuthiennhien3326" target="_blank" class="youtube"><i class="bx bxl-youtube"></i></a>
                        <a href="https://www.tiktok.com/@mayhomevn" target="_blank" class="tiktok"><i class="bx bxl-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Bản quyền thuộc về <strong><span>PAN</span></strong>.
            </div>
            <div class="credits">
                Thiết kế bởi <a href="https://thwebshop.online/" target="_blank">THwebshop.com</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Back To Top -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- End Back To Top -->
    <!-- Button Action -->
    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a href="tel:0987654321" class="pps-btn-img">
                <img src="{{ asset('public/catalog/nemcstn/assets/img/icons/phone.png') }}" alt="Gọi điện thoại" width="50">
            </a>
            </div>
        </div>
        <div class="hotline-bar">
            <a href="tel:0987654321">
                <span class="text-hotline">0939 25 83 83</span>
            </a>
        </div>
    </div>
    <div class="float-contact">
        <a class="btn-chat" href="http://zalo.me/0939258383" target="_bank">
            <div class="chat-img">
                <img src="https://classic.vn/wp-content/uploads/2022/07/zalo-icon.png" width="100" alt="">
            </div>
            <span>Chat qua Zalo</span>
        </a>
    </div>
    <!-- Popup -->
    <div class="popup-overlay"></div>
    <div class="popup">
        <span>Tự động đóng lại sau (<span class="text-red"><span id="countdown">10</span> giây</span>)</span>
        <button type="button" class="close-popup">
            <i class="bx bx-x icon-grey"></i>
        </button>
        <div class="popup-img">
            <img src="{{ asset('public/catalog/nemcstn/assets/img/success.jpg') }}" alt="" class="w-100">
        </div>
        <div class="popup-body">
            <h2>Gửi bảo hành thành công</h2>
            <p>
                P.A.N - Mayhome xin chào! <br/>
                Tập thể P.A.N – Mayhome chân thành cám ơn vì Bạn đã tin chọn sản phẩm của chúng tôi là người bạn đồng hành! <br/>
                Trong quá trình sử dụng sản phẩm, nếu có điều gì chưa rõ Quý khách hãy liên hệ với chúng tôi ngay: <br/>
                1. Địa chỉ email : <a href="mailto:cskh.pan@gmail.com">cskh.pan@gmail.com</a> <br/>
                2. Gọi trực tiếp vào số điện thoại Hotline: <a href="tel:0939258383">0939 25 83 83</a> <br>
                <span class="note">
                    Lưu ý: Trong giờ hành chánh từ Thứ 2 đến Thứ 6
                    P.A.N - Mayhome rất hân hạnh được phục vụ Quý khách!
                </span> 
            </p>
        </div>
    </div>
    <!-- End Popup -->

    <!-- Vendor JS Files -->
    <script src="{{asset('public/catalog/nemcstn/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <!-- Venobox -->
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('public/catalog/nemcstn/assets/js/core.js')}}"></script>
    <script src="{{asset('public/catalog/nemcstn/assets/js/main.js')}}"></script>
    <script>
        new VenoBox({
            selector: ".venobox",
            spinner: "circle-fade"
        });

        var preview = function(event, elm) {
            var output = document.getElementById(elm);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        };

        let guaranteeSubmit = () => {
            $("#guarantee-form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    dataType: 'json',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        $('.button-send').html('Đang gửi thông tin..');
                    },
                    success: function(res) {
                        $('.button-send').html('Gửi thông tin');
                        if(res.status == 200) {
                            $('#guarantee-form')[0].reset();
                            openPopup();
                            setTimeout(function() { 
                                closePopup();
                            }, 11500);
                        } else {
                            $.map(res.errors, function(value, key) {
                                $('.'+key+'_error').html(value);
                            });
                        }
                    }
                });
            });
        }

        $(function() {
            guaranteeSubmit();
            $('.close-popup').on('click', function() {
                closePopup();
            });
            
            activeLink();
        });
    </script>
</body>
</html>