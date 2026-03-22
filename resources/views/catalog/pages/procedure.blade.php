<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="mayhomevn" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <link rel="icon" type="image/x-icon" href="{{ asset('catalog/procedure/assets/favicon.png') }}" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- OwlCarousel2-2.3.4 -->
    <link rel="stylesheet" href="{{ asset('catalog/procedure/plugins/OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('catalog/procedure/plugins/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('catalog/procedure/css/styles.css') }}" rel="stylesheet" />
</head>
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('catalog/procedure/assets/img/logo-mayhome.png') }}" alt="Logo Mayhome" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('catalog.homepage') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Giới thiệu Nệm CSTN</a></li>
                    <li class="nav-item"><a class="nav-link" href="#video">Khâu đóng gói</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Quy trình mua nệm</a></li>
                    <li class="nav-item"><a class="nav-link" href="#buy">Kích hoạt bảo hành</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" id="header">
        <div class="container">
            <div class="masthead-subheading">MH <span style="font-size: 18px;">x</span> Nệm cao su thiên nhiên chính hãng</div>
            <div class="masthead-heading text-uppercase">7 ZONES MASSAGE</div>
            <a class="btn btn-primary btn-xl text-uppercase btn-relative" href="#about">Thông tin mh nệm CSTN</a>
        </div>
    </header>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">MH <span style="font-size: 14px;">x</span> GIỚI THIỆU CHUNG</h2>
                <h3 class="section-subheading text-muted">Nệm massage tinh hoa từng điểm chạm</h3>
            </div>
            <ul class="timeline">
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('catalog/procedure/assets/img/target.jpg') }}" alt="target.jpg" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>SỨ MỆNH</h4>
                        </div>
                        <div class="timeline-body text-justify">
                            <p class="text-muted">
                                <span>Mayhome thương hiệu độc quyền bởi Công ty TNHH SX TM Phát An Nhiên ( P.A.N).</span>
                            </p>
                            <p class="text-muted">
                                <span>P.A.N Vì 1 sứ mệnh: “Mang sản phẩm CAO SU THIÊN NHIÊN CHẤT LƯỢNG đến gần hơn, hợp túi tiền hơn với tất cả NGƯỜI TIÊU DÙNG Việt Nam”.</span>
                            </p>
                            <p class="text-muted">
                                <span>Slogan: "Mayhome không đâu bằng ở nhà"</span>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('catalog/procedure/assets/img/net-dac-trung.jpg') }}" alt="net-dac-trung.jpg" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>NÉT ĐẶC TRƯNG NỆM</h4>
                        </div>
                        <div class="timeline-body text-justify">
                            <p class="text-muted">
                                <span>Nâng cao tiêu chuẩn: Chính thức đạt thêm bước tiến về việc nâng cao tiêu chuẩn Chất lượng và An toàn cho sản phẩm “Oeko-tex Standard 100 toàn cầu"</span> <br/>
                            </p>
                            <p class="text-muted">
                                <span>Cải tiến "khâu đóng gói" bằng máy cuộn nệm: gọn gàng, tiết kiệm không gian vận chuyển. Dễ dàng giao hàng trong khu vực đường hẹp, nhà cao tầng,...</span> <br/>
                            </p>
                            <p class="text-muted">
                                <span>CSTN nguyên khối, xử lý qua công nghệ khử mùi tối ưu và áp dụng công nghệ cắt 7 zones mới.</span> <br/>
                            </p>
                            <p class="text-muted">
                                <span>Bảo hành nệm lên đến 10 năm, nâng đỡ tối ưu, hỗ trợ tốt cho cột sống, nhất là đối với người có tiền sử về bệnh đau cột sống, thoái vị đĩa đệm.</span> <br/>
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('catalog/procedure/assets/img/gio-hang.jpg') }}" alt="gio-hang.jpg" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>BẠN MUỐN MUA NỆM?</h4>
                        </div>
                        <div class="timeline-body text-justify">
                            <p class="text-muted">
                                <span>Kênh MT (Modern Trade): CoopMart, Coop Xtra, Emart, Mega Market, Big C / GO</span><br/>
                                <span>Thanh toán: tại cash của siêu thị</span><br/>
                                <span>Thời gian nhận được hàng: Miền Bắc 7 ngày - Miền Trung 5 Ngày và Miền Nam 3 ngày.</span><br/>
                                <span> Sau khi nhận được nệm Qúy khách vui lòng nhập kích hoạt bảo hành online để được hỗ trợ quyền lợi tốt nhất sau này.</span><br/>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="video">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">MH <span style="font-size: 14px;">x</span> VIDEO GIỚI THIỆU NỆM </h2>
                <h3 class="section-subheading text-muted">Chúng tôi mong muốn để người tiêu dùng hiểu hơn và xem được tổng quát về Nệm CSTN 7 Zones Massage chính hãng, nét đẹp sản phẩm, quá trình sản xuất, vận hành, đóng gói,....</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-12">
                    <div class="video-box">
                        <div class="video-box-iframe">
                            <iframe src="https://www.youtube.com/embed/qltD-gjg_Ak" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="video-box-caption">
                            <h2 class="video-title">MH <span style="font-size: 14px;">x</span> VIDEO GIỚI THIỆU VỀ NỆM CSTN CHÍNH HÃNG</h2>
                            <p class="video-subtitle text-muted">Nệm Massaga tinh hoa từng điểm chạm. Chúng tôi luôn Nâng cao tiêu chuẩn về Chất lượng và An toàn. CSTN nguyên khối chất lượng cao và Xử lý qua Công nghệ khử mùi hiện đại. Hàng ngàn lỗ thông hơi đảm bảo tính thoáng mát với Khả năng đàn hồi cực tốt. Nệm thiết kế nằm được 2 mặt và Nâng cấp tính năng Massage điểm nhấn nổi bật. Chúng tôi trao chất lượng – Nhận lại niềm tin với chính sách bảo hành Nệm lên đến 10 năm.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 mb-12">
                    <div class="video-box">
                        <div class="video-box-iframe">
                            <iframe src="https://www.youtube.com/embed/ybk2JYq6fus" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="video-box-caption">
                            <h2 class="video-title">MH <span style="font-size: 14px;">x</span> VIDEO GIỚI THIỆU KHÂU ĐÓNG GÓI NỆM BẰNG MÁY CUỘN</h2>
                            <p class="video-subtitle text-muted">Chúng tôi luôn không ngừng học hỏi, trao dồi để áp dụng những công nghệ "dẫn đầu về xu hướng" áp dụng những công nghệ, máy mốc mới nhất, hiện đại nhưng vẫn luôn phải an toàn - chất lượng nhất.  Máy cuộn nệm hỗ trợ nệm được gọn gàng hơn, tiết kiệm không gian vận chuyển và trưng bày. Dễ dàng giao hàng trong khu vực đường hẹp, nhà cao tầng, thang máy,..</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12 col-sm-12 mb-12">
                    <div class="video-box">
                        <div class="video-box-iframe">
                            <iframe src="https://www.youtube.com/embed/wOHMt3N8FvY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="video-box-caption">
                            <h2 class="video-title">HD kích hoạt bảo hành</h2>
                            <p class="video-subtitle text-muted">Hướng dẫn cách nhập thông tin kích hoạt bảo hành nệm cstn trực tiếp tại nhà thật tiện lợi.</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">NÉT ĐẶC TRƯNG NỆM CSTN 7 ZONES MASSAGE CHÍNH HÃNG</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <img class="img-fluid" src="{{ asset('catalog/procedure/assets/img/be-mat-massage.jpg') }}" alt="be-mat-massage.jpg"/>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">BỀ MẶT CLASSIC</div>
                            <div class="portfolio-caption-subheading text-muted"> Một mặt nệm với hàng ngàn lỗ thoáng khí đều nhau, phẳng. Rất phù hợp với khí hậu gió mùa nhiệt đới ở nước ta, làm tăng khả năng thoáng khí tối đa, mang cảm giác thoáng mát, tránh ẩm mốc, hầm, khó chịu khi nằm.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <img class="img-fluid" src="{{ asset('catalog/procedure/assets/img/be-mat-classic.jpg') }}" alt="be-mat-classic.jpg"/>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">BỀ MẶT MASSAGE</div>
                            <div class="portfolio-caption-subheading text-muted">
                                Một mặt nệm được Nâng cấp tính năng Massage và Hạt Massage điểm nhấn nổi bật riêng cho nệm. Đặc trưng với 7 điểm trên bề mặt nệm tiếp xúc với  bộ phận cơ thể khi nằm: đầu- cổ - vai gáy – lưng – hông - đùi và chân giúp thư giãn tối đa và tạo cảm giác dễ chịu cho người dùng.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <img class="img-fluid" src="{{ asset('catalog/procedure/assets/img/vo-nem-luoi.jpg') }}" alt="vo-nem-luoi.jpg"/>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">VỎ NỆM LƯỚI</div>
                            <div class="portfolio-caption-subheading text-muted">
                               Lớp vỏ nệm lưới đóng vai trò vô cùng quan trọng: sẽ Cố định và bảo vệ tấm nệm nguyên khối giúp hạn chế da tiếp cận trực tiếp lên bề mặt CSTN. Với chất liệu Vải lạnh 150 GSM 100%  Polyester mang lại cảm giác Mát và có độ đàn hồi nhẹ khi tiếp xúc.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section bg-light" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">QUY TRÌNH MUA NỆM CSTN 7 ZONES  MASSAGE CHÍNH HÃNG</h2>
                <h3 class="section-subheading text-muted">Sản phẩm nệm chúng tôi chỉ bán trực tiếp tại kênh MT (Modern Trade) - kênh phân phối bán hàng tại hệ thống siêu thị. Nên Qúy khách có nhu cầu mua nệm vui lòng tham khảo các bước theo hướng dẫn</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4 mb-2">
                    <span class="fa-stack fa-4x">
                        <i class="fa-solid fa-circle-check fa-stack-2x text-primary"></i>
                    </span>
                    <h4 class="my-3">
                        <span>BƯỚC 1</span><br/>
                        <span>CHỌN SẢN PHẨM PHÙ HỢP</span>
                    </h4>
                    <p class="text-muted text-center">
                        <span>Qúy khách xem tham khảo loại nệm cần mua:</span><br/>
                        <span>kích thước, độ dày phù hợp với nhu cầu</span><br/>
                        <span>Xác định sẽ mua tại kênh siêu thị nào: đến trực tiếp để xem - chạm trực tiếp nệm mẫu " mô hình nệm thu nhỏ demo" tại siêu thị để đưa ra lựa chọn.</span><br/>
                        <span>Chúng tôi cam kết mô hình sẽ có chất lượng tương đương với sản phẩm nệm nguyên tấm.</span>
                    </p>
                </div>
                <div class="col-md-4 mb-2">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">
                        <span>BƯỚC 2</span><br/>
                        <span>THANH TOÁN MUA HÀNG</span>
                    </h4>
                    <p class="text-muted">
                        Chọn được loại nệm phù hợp và quyết định mua. <br/>
                        Qúy khách cần ra quầy cash "quầy thu ngân" của siêu thị đó để thanh toán tiền và nhận bill hoặc giấy hẹn để siêu thị giao hàng. <br/>
                        Khi có bill siêu thị sẽ liên hệ nhân viên chúng tôi để đặt hàng và P.A.N sẽ giao hàng về cho siêu thị kịp thời gian 
                        trả đơn cho Qúy khách hàng. <br/>
                    </p>
                </div>
                <div class="col-md-4 mb-2">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        <i class="fas fa-edit fa-stack-2x text-primary"></i>
                    </span>
                    <h4 class="my-3">
                        BƯỚC 3 <br/>
                        NHẬN NỆM & NHẬP KÍCH HOẠT BẢO HÀNH
                    </h4>
                    <p class="text-muted">
                        Sau khi nhận được nệm Qúy khách kiểm tra trực tiếp với nhân viên giao hàng. <br>
                        Vì Quyền lợi lâu dài của Qúy khách hàng. Để phục vụ Quý khách hàng nhanh chóng và cung cấp dịch vụ tốt hơn.
                        Vui lòng tiến hành nhập thông tin để kích hoạt bảo hành nệm "xem video hướng dẫn" để thực hiện nhanh nhất.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Buy -->
    <section class="page-section" id="buy">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">KÍCH HOẠT BẢO HÀNH NỆM CSTN 7 ZONES MASSAGE CHÍNH HÃNG</h2>
                <h3 class="section-subheading text-muted">Qúy khách hàng cần check lại mình đã mua loại nệm kích thước và độ dày như thế nào. Từ đó, nhìn sang phải chột "Bảo Hành" click chọn ô tương ứng với kích thước và độ dày của nệm để nhập kích hoạt bảo hành và điền thông tin theo form sẵn. Chọn gửi " BẮT ĐẦU KÍCH HOẠT BẢO HÀNH NỆM" là hoàn thành.</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-warning mb-2" id="btn-policy">Điều kiện bảo hành</a>
                    <div class="table-responsive-sm">
                        <table class="table table-hover table-bordered border-primary table-buy">
                            <caption class="table-cap d-lg-none d-xl-block">Trượt sang phải để mua hàng, bảo hành <i class="fa-solid fa-arrow-right"></i></caption>
                            <thead class="table-primary">
                                <tr>
                                    <th>Kích thước</th>
                                    <th>Độ dày (cm)</th>
                                    <th>Giá niêm yết</th>
                                    <th>Bảo hành</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($nemcstn) > 0)
                                    @foreach($nemcstn as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->thickness }}</td>
                                            <td>{{ number_format($item->price) }}đ</td>
                                            <td>
                                                <a 
                                                    href="#" 
                                                    class="btn btn-success btn-procedure"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name }}"
                                                    data-thickness="{{ $item->thickness }}"
                                                >Kích hoạt BH</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">CHỨNG NHẬN TOÀN CẦU</h2>
                <h3 class="section-subheading text-muted">Chúng tôi tự hào, sản phẩm nhận được nhiều chứng nhận của các tổ chức uy tính trong nước và quốc tế.</h3>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-member">
                        <div class="team-member-img">
                            <img src="{{ asset('catalog/procedure/assets/img/certification/oeko-tex.jpg') }}" alt="oeko-tex.jpg" />
                        </div>
                        <div class="team-member-info">
                            <h3>Chứng nhận Oeko-tex Standard 100 toàn cầu</h3>
                            <p class="text-muted">
                                Oeko-tex Standard 100 Giải pháp đáng tin cậy với mục đích bảo vệ khách hàng khỏi các chất độc hại thông qua 
                                kiểm nghiệm độc lập và chứng nhận các sản phẩm dệt may Chứa ít chất gây độc hại nhất.
                            </p>
                            <p class="text-muted">
                                OEKO-TEX® STANDARD 100 là một trong những nhãn hàng dệt may nổi tiếng nhất thế giới được kiểm tra các chất 
                                độc hại. Nó tượng trưng cho niềm tin của khách hàng và độ an toàn cao của sản phẩm.
                            </p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="team-member-img">
                            <img src="{{ asset('catalog/procedure/assets/img/certification/SGS.jpg') }}" alt="SGS.jpg" />
                        </div>
                        <div class="team-member-info">
                            <h3>Chứng nhận kiểm định chất lượng quốc tế SGS</h3>
                            <p class="text-muted">
                                SGS là một công ty đa quốc gia của Thụy Sĩ có trụ sở tại Geneva. Công ty thử nghiệm, giám định và chứng nhận 
                                hàng đầu thế giới được công nhận là chuẩn mực toàn cầu về tính bền vững, chất lượng và tính toàn vẹn. 
                                Chứng nhận SGS chứng minh sản phẩm, quy trình, hệ thống và dịch vụ của doanh nghiệp mình đã tuân thủ các tiêu 
                                chuẩn cũng như quy định quốc gia hoặc quốc tế.
                            </p>
                            <p class="text-muted">
                                SGS giữ Vai trò chính là kiểm tra chất lượng và thực trạng sản phẩm có đáp ứng được các tiêu chuẩn về sức khỏe, 
                                an toàn đã đặt ra hay không (đa dạng các ngành từ nông nghiệp, hóa học, môi trường, hàng tiêu dùng bán lẻ đến 
                                năng lượng…), tiêu chuẩn hay giấy chứng nhận SGS được coi là cơ sở để người tiêu dùng dựa vào đó chọn ra hàng 
                                hóa chất lượng, đảm bảo sức khỏe cho gia đình mình.
                            </p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="team-member-img">
                            <img src="{{ asset('catalog/procedure/assets/img/certification/hop-quy.jpg') }}" alt="hop-quy.jpg" />
                        </div>
                        <div class="team-member-info">
                            <h3>Hợp Quy CR Kiểm định bởi Công ty cổ phần giám định khử trùng VIETNAMCONTROL</h3>
                            <p class="text-muted">
                                Dấu hợp quy CR (tem CR) là dấu chứng nhận hợp quy do Nhà Nước ban hành. Sản phẩm có dán tem CR là những sản 
                                phẩm, hàng hóa hoàn toàn đáp ứng các yêu cầu của quy chuẩn kỹ thuật quốc gia liên quan và được phép lưu thông 
                                trên thị trường. Quá trình kiểm định và chứng nhận để cấp dấu hợp quy phải được thực hiện bởi các tổ chức chứng 
                                nhận được Nhà Nước chỉ định. 
                            </p>
                            <p class="text-muted">
                                CR đặc điểm để nhận diện chứng nhận sản phẩm của doanh nghiệp đảm bảo chất lượng tốt cho người tiêu dùng và 
                                đã được phép cho sản phẩm lưu thông và tiêu thụ trên thị trường nước ta. Hoặc dễ hiểu hơn CR là tiêu chuẩn 
                                cơ sở giúp cho người tiêu dùng lựa chọn được các sản phẩm đạt chất lượng, an toàn và đạt chuẩn theo quy định 
                                của nhà nước.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="owl-carousel owl-parner">
                <div class="item">
                    <div class="partner-img">
                        <img src="{{ asset('catalog/procedure/assets/img/partner/coopmart.jpg') }}" alt="coopmart.jpg"/>
                    </div>
                </div>
                <div class="item">
                    <div class="partner-img">
                        <img src="{{ asset('catalog/procedure/assets/img/partner/coopxtra.png') }}" alt="coopxtra.png"/>
                    </div>
                </div>
                <div class="item">
                    <div class="partner-img">
                        <img src="{{ asset('catalog/procedure/assets/img/partner/emart.png') }}" alt="emart.png"/>
                    </div>
                </div>
                <div class="item">
                    <div class="partner-img">
                        <img src="{{ asset('catalog/procedure/assets/img/partner/mega-market.png') }}" alt="mega-market.png"/>
                    </div>
                </div>
                <div class="item">
                    <div class="partner-img">
                        <img src="{{ asset('catalog/procedure/assets/img/partner/big-c.jpg') }}" alt="big-c.jpg"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-footer">
        <img src="{{ asset('catalog/procedure/assets/img/bg-footer.jpg') }}" class="w-100" alt="bg-footer.jpg">
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">BỘ PHẬN HỖ TRỢ CHĂM SÓC KHÁCH HÀNG</h2>
            </div>
            <div class="text-center text-contact">
                <p>Email: <span class="text-white">cskh.pan@gmail.com</span></p>
                <p>Hotline: <span class="text-white">0939.258.383</span> hoặc <span class="text-white">0817.975.494</span></p>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Bản quyền &copy; thuộc về P.A.N 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/mayhomepan" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="https://thwebshop.online" target="_blank">Thiết kế bởi THwebshop</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Modals -->
    <div class="portfolio-modal modal fade" id="procedure-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('catalog/procedure/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-header">
                                <h2 class="text-uppercase">Form bảo hành</h2>
                            </div>
                            <div class="modal-body">
                                <form id="guarantee-form" action="{{ route('catalog.postAddGuarantee') }}" method="POST" class="form-buy" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label><span style="color: red;">*</span>Sản phẩm kích hoạt bảo hành</label>
                                        <input type="text" class="form-control text-center p-name" name="productName" id="p-name" value="" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;">*</span>Họ và tên</label>
                                        <input type="text" class="form-control" value="" name="name" id="name" placeholder="Nhập họ và tên">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;">*</span>Số điện thoại người mua</label>
                                        <input type="text" class="form-control" value="" name="phoneNumber" id="phone-number" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="" name="email" id="email" placeholder="example@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;">*</span>Mua tại hệ thống</label>
                                        <input type="text" class="form-control" value="" name="systemName" id="system-name" placeholder="Nhập đúng tên hệ thống (VD: coopmart, emart, big-c,..)">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;">*</span>Hình ảnh bill hóa đơn</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label>Chú thích</label>
                                        <textarea name="note" class="form-control" rows="5" id="note" placeholder="Lý do cần bảo hành"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info btn-xl text-uppercase mt-3 btn-guarantee">Yêu cầu kích hoạt</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="policy-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('catalog/procedure/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-header">
                                <h2 class="text-uppercase">Điều kiện bảo hành</h2>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Thời gian bảo hành 10 năm tính từ ngày Qúy khách hàng mua sản phẩm nệm CSTN 7 Zones Massage tại các hệ thống bán hàng của P.A.N Trên toàn quốc.</p>
                                <p class="text-left">
                                    <b>Trường hợp được bảo hành:</b><br>
                                    <span>Nệm không đàn hồi, xẹp lún, biến dạng không trở về hình dạng ban đầu.</span><br/>
                                    <span>Nệm bị chảy nhựa CSTN hay bị vụn vỡ.</span><br/>
                                </p>
                                <p class="text-left">
                                    <b>Trường hợp không được bảo hành:</b><br>
                                    <span>Nệm ngả màu vàng "vàng tự nhiên của CSTN".</span><br/>
                                    <span>Sử dụng nệm không đúng như "Hướng dẫn sử dụng và Khuyến Cáo".</span><br/>
                                    <span>Nệm bị lão hóa vì phơi nắng “Đặc tính của CSTN sẽ bị lão hóa dưới tác động của tia cực tím trong sáng mặt trời".</span><br/>
                                    <span>Thức ăn, chất tẩy rửa, hóa chất, chất tẩy rửa,… bị đổ vào nệm, làm dơ bẩn nệm.</span><br/>
                                    <span>Bảo quản nệm trong điều kiện nhiệt độ không vượt quá 40 độ C/104F trong thời gian kéo dài.</span><br/>
                                    <span>Bị tác động bởi những vật nhọn hoặc tải trọng quá cỡ tác động phá vỡ kết cấu nệm.</span><br/>
                                    <span>Nệm có mùi hương nhẹ "Đó là đặc trưng của nệm có nguồn gốc từ CSTN".</span><br/>
                                </p>
                                <p class="text-left">
                                    <b>Hướng dẫn sử dụng và khuyến cáo:</b><br>
                                    <span>1. Không giặt ruột nệm. Không dùng chất tẩy, rửa nệm.</span><br/>
                                    <span>2. Khi cần vệ sinh, dùng khăn ướt lau sạch vết bẩn sau đó lại lau bằng khăn khô.</span><br/>
                                    <span>3. Bảo quản sản phẩm ở nơi khô ráo, thoáng mát.</span><br/>
                                    <span>4. Không phơi nệm trực tiếp dưới ánh nắng mặt trời.</span><br/>
                                    <span>5. Không để nệm tiếp xúc gần với nguồn nhiệt cao.</span><br/>
                                    <span>6. Không ủi/ là trên nệm.</span><br/>
                                    <span>7. Không dùng ngoại lực giặt các điểm massage.</span><br/>
                                    <span>8. Nên dùng thiết bị bảo vệ nệm như: tấm bảo vệ nệm hay ga nệm và thay ga nệm thường xuyên</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('catalog/procedure/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('catalog/vendor/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
    <!-- OwlCarousel2-2.3.4 -->
    <script src="{{ asset('catalog/procedure/plugins/OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>
    <!-- jquery-validation-1.19.5 -->
    <script src="{{ asset('catalog/procedure/plugins/jquery-validation-1.19.5/jquery.validate.min.js') }}"></script>
    <!-- sweetalert 1 -->
    <script src="{{ asset('catalog/procedure/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('catalog/procedure/js/scripts.js') }}"></script>
    <script>
        // Events
        $("#guarantee-form").validate({
            rules: {
                name: 'required',
                phoneNumber: 'required',
                phoneNumber: {
                    required: true,
                    minlength: 10,
                    maxlength: 12,
                },
                systemName: 'required',
                image: 'required',
            },
            messages: {
                name: 'Vui lòng nhập họ và tên!',
                phoneNumber: 'Vui lòng nhập số điện thoại!',
                phoneNumber: {
                    required: 'Vui lòng nhập số điện thoại!',
                    minlength: 'Số điện thoại không hợp lệ!',
                    maxlength: 'Số điện thoại không hợp lệ!',
                },
                systemName: 'Vui lòng nhập hệ thống mua hàng!',
                image: 'Vui lòng chọn ảnh hóa đơn mua hàng!',
            },
            submitHandler: function() {
                var url = $('#guarantee-form').attr('action');
                var method = $('#guarantee-form').attr('method');
                var fd = new FormData();
                fd.append('_token', '{{ csrf_token() }}');
                fd.append('name', $('#name').val());
                fd.append('phoneNumber', $('#phone-number').val());
                fd.append('productName', $('#p-name').val());
                fd.append('email', $('#email').val());
                fd.append('systemName', $('#system-name').val());
                fd.append('image', $('#image')[0].files[0]);
                fd.append('note', $('#note').val());

                addGuarantee(url, method, fd);
            }
        });

        $('body').on('click', '.btn-procedure', function(e) {
            e.preventDefault();
            var name = $(this).attr('data-name');
            var thickness = $(this).attr('data-thickness');
            $('.p-name').val(`Nệm CSTN 7 ZONES MESSAGE ${name} - ${thickness}`);

            $('#procedure-modal').modal('show');
        });

        $('#btn-policy').on('click', function(e) {
            e.preventDefault();
            $('#policy-modal').modal('show');
        });

        $('body').on('click', '.btn-buy', function(e) {
            e.preventDefault();
            $('#buy-modal').modal('show');
        });

        // Cores
        let addGuarantee = (url, method, form) => {
            $.ajax({
                url: url,
                method: method,
                dataType: 'json',
                data: form,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function() {
                    $('.btn-guarantee').html('Đang gửi thông tin..');
                },
                success: function(res) {
                    setTimeout(function() { 
                        $('.btn-guarantee').html('Yêu cầu kích hoạt');
                        $('#guarantee-form')[0].reset();
                        if(res.status == 200) {
                            swal({
                                title: "Thành công",
                                text: res.message,
                                icon: "success",
                                button: false,
                                timer: 2000,
                            });
                        }
                    }, 800);

                    setTimeout(function(){ 
                        if(res.status == 200) {
                            $('#procedure-modal').modal('hide');
                        }
                    }, 2500);
                },
                error: function(err) {
                    console.error(err);
                }
            });
        }
    </script>
</body>
</html>
