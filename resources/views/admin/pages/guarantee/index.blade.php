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
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">{{ $pageTitle }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Số ĐT</th>
                                    <th>Email</th>
                                    <th>Siêu thị</th>
                                    <th>Sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Ghi chú</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach($guarantees as $guarantee)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $guarantee->name }}</td>
                                        <td>{{ $guarantee->phone_number }}</td>
                                        <td>{{ $guarantee->email }}</td>
                                        <td>{{ $guarantee->system_name }}</td>
                                        <td>{{ $guarantee->product_name }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $guarantee->image) }}" target="_blank">
                                                <img src="{{ asset('admin/assets/dist/img/icons/icon-search.jpg') }}" width="35" height="35" alt="">
                                            </a>
                                        </td>
                                        <td>{{ $guarantee->note }}</td>
                                        <td>{{ date_format(date_create($guarantee->created_at), 'd/m/Y H:i') }}</td>
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