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
            <li><a href="{{ route('admin.customer.getList') }}"><i class="fa fa-th"></i> Khách hàng</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="{{ route('admin.user.getAdd') }}" class="btn btn-primary btn-sm mr-1" title="Thêm mới"><i class="fa fa-plus"></i> Thêm mới</a>
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
                                    <th>Họ tên KH</th>
                                    <th>Địa chỉ e-mail</th>
                                    <th>Nhóm khách hàng</th>
                                    <th>Đăng ký nhân tin</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($customers) > 0)
                                    @php $count = 0; @endphp
                                    @foreach($customers as $customer)
                                        @php $count++; @endphp
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $customer->lastname }} {{ $customer->firstname }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>Mặc định</td>
                                            <td>
                                                @if($customer->newsletter == 1)
                                                    <small class="label bg-blue">Đắng ký</small>
                                                @else
                                                    <small class="label bg-red">Không đăng ký</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if($customer->status == 1)
                                                    <small class="label bg-green">Kích hoạt</small>
                                                @else
                                                    <small class="label bg-red">Vô hiệu hóa</small>
                                                @endif
                                            </td>
                                            <td>{{ date_vi($customer->created_at) }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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