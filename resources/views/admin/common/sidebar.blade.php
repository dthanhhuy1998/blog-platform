@if(Auth::user())
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="@if(!empty(Auth::user()->image)) {{ asset('storage/' . Auth::user()->image) }} @else {{ asset('storage/uploads/default.png') }} @endif" class="img-circle" alt="Avatar">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->lastname }} {{ Auth::user()->firstname }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Tìm mã đơn hàng...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">BẢNG ĐIỀU KHIỂN</li>
                <li>
                    <a href="{{ route('catalog.homepage') }}" target="_blank">
                        <i class="fa fa-home"></i> <span>Đi đến trang chủ</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.index') }}">
                        <i class="fa fa-th"></i> <span>Trang chính</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cubes"></i> <span>Quản lý sản phẩm</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.product.getList') }}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                        <li><a href="{{ route('admin.product.category.getList') }}"><i class="fa fa-circle-o"></i> Danh mục</a></li>
                        <li><a href="{{ route('admin.product.group.getList') }}"><i class="fa fa-circle-o"></i> Nhóm hàng</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>Quản lý bài viết</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.article.getList') }}"><i class="fa fa-circle-o"></i> Danh sách bài viết</a></li>
                        <li><a href="{{ route('admin.article.category.getList') }}"><i class="fa fa-circle-o"></i> Danh mục</a></li>
                    </ul>
                </li>
                {{-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i> <span>Bán hàng</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.invoices.index') }}"><i class="fa fa-circle-o"></i> Quản lý đơn hàng</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-paint-brush" aria-hidden="true"></i> <span>{{__('Page Management')}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.landing.index') }}"><i class="fa fa-circle-o"></i> {{__('Page List')}}</a></li>
                        <li><a href="{{ route('admin.landing.category.index') }}"><i class="fa fa-circle-o"></i> {{__('Category')}}</a></li>
                        <li><a href="{{ route('admin.landing.product.index') }}"><i class="fa fa-circle-o"></i> {{__('Product List')}}</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-ticket"></i> <span>{{__('Voucher Manager')}}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.vouchers.index') }}"><i class="fa fa-circle-o"></i> {{__('Voucher List')}}</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i> <span>Báo cáo</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.report.reportRevenueByMonth') }}"><i class="fa fa-circle-o"></i> Doanh thu theo tháng</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('admin.quote.getList') }}"><i class="fa fa-paper-plane"></i> <span>Yêu cầu báo giá</span></a></li>
                <li><a href="{{ route('admin.guarantee.index') }}"><i class="fa fa-thumbs-up"></i> <span>Yêu cầu bảo hành</span></a></li> --}}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-paint-brush"></i> <span>Giao diện</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.theme.slide.index') }}"><i class="fa fa-circle-o"></i> {{__('Slide')}}</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>Hệ thống</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.config.index') }}"><i class="fa fa-circle-o"></i> Cấu hình chung</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Tài khoản
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('admin.user.getList') }}"><i class="fa fa-circle-o"></i> Danh sách tài khoản</a></li>
                                <li><a href="{{ route('admin.user.getResetPass', [Auth::user()->id]) }}"><i class="fa fa-circle-o"></i> Đổi mật khẩu</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
@endif