@extends('admin.common.layout')

@section('title')
    {!! $headingTitle !!}
@endsection

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-th"></i> Trang chính</a></li>
            <li><a href="#"><i class="fa fa-th"></i> Bài viết</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="{{ route('admin.article.category.getAdd') }}" class="btn btn-primary btn-sm mr-1" title="Thêm mới"><i class="fa fa-plus"></i> Thêm mới</a>
                </div>
            </div>
            <div class="col-md-12">
                @if(session('success_msg'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                    <h4><i class="icon fa fa-check"></i> Thành công</h4>
                    {{ session('success_msg') }}
                </div>
                @endif
                @if(session('warning_msg'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                    <h4><i class="icon fa fa-exclamation"></i> Cảnh báo</h4>
                    {{ session('warning_msg') }}
                </div>
                @endif
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-list"></i> {{ $pageTitle }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên KH</th>
                                    <th>Sản phẩm yêu cầu</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Ngày yêu cầu</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach($quotes as $quote)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $quote->customer_name }}</td>
                                        <td>
                                            Sản phẩm: <strong> {{ $quote->product }}</strong> <br/>
                                            Lời nhắn: {{ $quote->message }}
                                        </td>
                                        <td>{{ $quote->phone_number }}</td>
                                        <td>{{ $quote->email }}</td>
                                        <td>{{ date_vi($quote->created_at) }}</td>
                                        <td>
                                            @if($quote->status == 1)
                                                <small class="label bg-green">Đã liên hệ</small>
                                            @else
                                                <small class="label bg-yellow">Đang xử lý</small>
                                            @endif
                                        </td>
                                        <td width="10%">
                                            @if($quote->status == 1)
                                                <a href="{{ route('admin.quote.changeStatus', [$quote->id]) }}" class="btn btn-default btn-sm" title="Khôi phục trạng thái" onclick="return confirm('Bạn có muốn khôi phục trạng thái yêu cầu. Khôi phục?');"><i class="fa fa-phone"></i></a>
                                            @else
                                                <a href="{{ route('admin.quote.changeStatus', [$quote->id]) }}" class="btn btn-success btn-sm" title="Xác nhận đã liên hệ"  onclick="return confirm('Bạn có muốn xác nhận đã liên hệ. Xác nhận?');"><i class="fa fa-phone"></i></a>
                                            @endif
                                            <a href="{{ route('admin.quote.getDelete', [$quote->id]) }}" class="btn btn-danger btn-sm" title="Xóa bỏ" onclick="return confirm('Bạn có chắn chắn muốn hủy yêu cầu này. Hủy bỏ?');"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
<script>
  $(function () {
    $('#datatable').DataTable();
  })
</script>
@endsection