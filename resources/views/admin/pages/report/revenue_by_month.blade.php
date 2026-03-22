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
            <li><a href="#"><i class="fa fa-th"></i> Báo cáo</a></li>
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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="20%">THÁNG</th>
                                    <th>DOANH THU</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reportData as $keyData => $valueData)
                                    @if ($keyData != 'total')
                                        <tr>
                                            <td>Tháng {{ $keyData }}/{{ date('Y') }}</td>
                                            <td><strong>đ{{ number_format($valueData) }}</strong></td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td><strong style="font-size: 16px;">TỔNG CỘNG</strong></td>
                                    <td><strong style="font-size: 16px;" class="text-blue">đ{{ number_format($reportData['total']) }}</strong></td>
                                </tr>
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