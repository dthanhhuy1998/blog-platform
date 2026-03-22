@extends('admin.common.layout')

@section('title')
    {!! $headingTitle !!}
@endsection

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $titlePage }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Trang chính</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ number_format($productTotal) }}</h3>
                        <p>Tổng số sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <a href="{{ route('admin.product.getList') }}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ number_format($articleTotal) }}</h3>
                        <p>Tổng số bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <a href="{{ route('admin.article.getList') }}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{ number_format($quoteToday) }}</h3>
                        <p>Yêu cầu báo giá hôm nay</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="{{ route('admin.quote.getList') }}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ number_format($userTotal) }}</h3>
                        <p>Tổng số tài khoản</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{ route('admin.user.getList') }}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <section class="col-md-7">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Top bài viết quan tâm</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Lượt xem</th>
                                    <th>Liên kết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach($mostViewedPosts as $post)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td width="70%">{{ $post->title }}</td>
                                        <td>{{ number_format($post->view) }}</td>
                                        <td width="10%">
                                            <a href="{{ route('catalog.article', [$post->slug]) }}" class="btn btn-info" target="_blank"><i class="fa fa-link"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <section class="col-md-5">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Yêu cầu báo giá trong tháng</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Khách hàng</th>
                                    <th>Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $quoteMonthCount = 0; @endphp
                                @foreach($quoteMonths as $quote)
                                    @php $quoteMonthCount++; @endphp
                                    <tr>
                                        <td>{{ $quoteMonthCount }}</td>
                                        <td>{{ $quote->customer_name }}</td>
                                        <td>{{ $quote->phone_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection

@section('script')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('storage/admin/assets/dist/js/pages/dashboard.js') }}"></script>

<script>
    $(function () {
        $('#datatable').DataTable();
    })
</script>
@endsection