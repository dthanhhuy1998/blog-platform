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

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <a href="{{ route('admin.invoices.index') }}" class="btn btn-default"><i class="fa fa-undo" style="margin-right: 5px;"></i> Đơn hàng</a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-xs-12">
                        <div class="box box-primary box-solid">
                            <div class="box-header">
                                <h3 class="box-title">Thông tin giao hàng</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="datatable" class="table">
                                    <tbody>
                                        <tr>
                                            <td width="20%"><strong>Khách hàng</strong></td>
                                            <td>{{ $invoice->fullname }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><strong>Điện thoại</strong></td>
                                            <td>{{ $invoice->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><strong>Địa chỉ</strong></td>
                                            <td>
                                                @if(!empty($invoice->province)) {{ $invoice->relatedProvince->name }}, @endif
                                                @if(!empty($invoice->district)) {{ $invoice->relatedDistrict->name }}, @endif
                                                @if(!empty($invoice->ward)) {{ $invoice->relatedWard->name }}, @endif
                                                @if(!empty($invoice->address)) {{ $invoice->address }} @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><strong>Ghi chú</strong></td>
                                            <td>{{ $invoice->note }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><strong>{{__('Voucher Code')}}</strong></td>
                                            <td>{{ $invoice->voucher_id ? $invoice->voucher->code : '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box box-primary box-solid">
                            <div class="box-header">
                                <h3 class="box-title">Chi tiết đơn hàng</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá tiền</th>
                                            <th>Số lượng</th>
                                            <th>Giảm giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($products) > 0)
                                            @foreach($products as $product)
                                                @php 
                                                    $options = json_decode($product->options, TRUE);
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <img src="{{ $options['image'] }}" width="80" height="80" style="object-fit: cover; object-position: center;" alt="">
                                                    </td>
                                                    <td width="35%">{{ $product->product_name }}</td>
                                                    <td align="right"><strong>đ{{ number_format($product->product_price) }}</strong></td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td align="right"><strong>đ{{ number_format($product->discount) }}</strong></td>
                                                    <td align="right"><strong>đ{{ number_format($product->subtotal) }}</strong></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5" align="right" style="font-weight: bold; font-size: 16px;">{{__('Sub Total')}}</td>
                                                <td align="right" style="font-weight: bold; font-size: 16px;">đ{{ number_format($invoice->price_total) }}đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" align="right" style="font-weight: bold; font-size: 16px;">{{__('Discount')}}</td>
                                                <td align="right" style="font-weight: bold; font-size: 16px;">đ{{ number_format($invoice->discount) }}đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" align="right" style="font-weight: bold; font-size: 16px;">{{__('Total')}}</td>
                                                <td align="right" style="font-weight: bold; font-size: 16px;">đ{{ number_format($invoice->price_total) }}</td>
                                            </tr>
                                        @endif  
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <form id="save-form" action="{{ route('admin.invoices.save') }}" method="POST" class="box box-primary box-solid">
                            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                            <div class="box-header">
                                <h3 class="box-title">Thao tác đơn hàng</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="datatable" class="table">
                                    <tbody>
                                        <tr>
                                            <td width="30%"><strong>Trạng thái</strong></td>
                                            <td>
                                                <div class="form-group">
                                                    <select name="status" class="form-control" @if ($invoice->status != 'pending') disabled @endif>
                                                        @foreach($invoiceStatus as $status)
                                                            <option 
                                                                value="{{ $status->code }}"
                                                                @if ($invoice->status == $status->code)
                                                                    selected
                                                                @endif
                                                            >{{ $status->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="box-footer">
                                @if ($invoice->status == 'pending')
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary btn-save">
                                            <i class="fa fa-save" style="margin-right: 5px;"></i>
                                            Lưu lại
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('script')
<script>
    $('.btn-save').on('click', function() {
        var form = $('#save-form');

        var invoiceId = form.find('input[name="invoice_id"]').val();
        var status =  form.find('select[name="status"]').val();

        if (status == 'success') {
            if (confirm('Lưu ý: Thao tác này sẽ trừ tồn kho của sản phẩm. Bạn có chắc chắn muốn thực hiện?')) {
                let params = {
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: {
                        _token: '{{ csrf_token() }}',
                        invoice_id: invoiceId,
                        status: status
                    },
                }
                
                saveInvoice(params);
            }
        }

        if (status == 'cancel') {
            if (confirm('Lưu ý: Thao tác này sẽ không thể khôi phục. Bạn có chắc chắn muốn thực hiện?')) {
                let params = {
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: {
                        _token: '{{ csrf_token() }}',
                        invoice_id: invoiceId,
                        status: status
                    },
                }

                saveInvoice(params);
            }
        }

        return;
    });

    function saveInvoice(params) {
        $.ajax({
            url: params.url,
            method: params.method,
            dataType: 'json',
            data: params.data,
            beforeSend: function() {
                $('.btn-save').html('<i class="fa fa-spinner" style="margin-right: 5px;"></i>Đang xử lý..');
            },
            success: function(response) {
                if (response.status == 200) {
                    $('.btn-save').html('<i class="fa fa-save" style="margin-right: 5px;"></i>Lưu lại');

                    setTimeout(function() { 
                        location.href = response.redirect;
                    }, 300);
                }
            },
            error: function(err) {
                console.error(err);
            }
        });
    }
</script>
@endsection