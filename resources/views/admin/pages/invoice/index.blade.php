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
            <li><a href="#"><i class="fa fa-th"></i> Đơn hàng</a></li>
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
                        <h3 class="box-title"><i class="fa fa-list"></i> {{ $pageTitle }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Điện thoại</th>
                                    <th>Địa chỉ giao hàng</th>
                                    <th>SL sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($invoices) > 0)
                                    @php $count = 0; @endphp
                                    @foreach ($invoices as $invoice)
                                        @php $count++; @endphp
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td><a title="Xem chi tiết" href="{{ route('admin.invoices.edit', $invoice->id) }}">{{ $invoice->invoice_code }}</a></td>
                                            <td>{{ $invoice->fullname }}</td>
                                            <td>{{ $invoice->mobile }}</td>
                                            <td>
                                                <span>@if(!empty($invoice->province)) {{ $invoice->relatedProvince->name }} @endif</span><br/>
                                                <span>
                                                    @if(!empty($invoice->district)) {{ $invoice->relatedDistrict->name }}, @endif
                                                    @if(!empty($invoice->ward)) {{ $invoice->relatedWard->name }}, @endif
                                                    @if(!empty($invoice->address)) {{ $invoice->address }} @endif
                                                </span>
                                            </td>
                                            <td>{{ $invoice->product_count }}</td>
                                            <td><strong>đ{{ number_format($invoice->price_total) }}</strong></td>
                                            <td><span class="badge" style="background-color: {{ $invoice->relatedStatus->color }};">{{ $invoice->relatedStatus->name }}</span></td>
                                            <td>{{ date_format(date_create($invoice->created_at), 'd/m/Y H:i') }}</td>
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