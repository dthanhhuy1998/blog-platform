@extends('admin.common.layout')

@section('title')
    {!! $headingTitle !!}
@endsection

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> {{__('Dashboard')}}</a></li>
            <li><a href="{{route('admin.landing.product.index')}}"><i class="fa fa-cubes"></i> {{__('Product')}}</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="{{ route('admin.landing.product.create') }}" class="btn btn-primary btn-sm mr-1" title="{{__('Add New')}}"><i class="fa fa-plus"></i> {{__('Add New')}}</a>
                </div>
            </div>
            <div class="col-md-12">
                @if(session('success_msg'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                        <h4><i class="icon fa fa-check"></i> {{__('Success')}}</h4>
                        {{ session('success_msg') }}
                    </div>
                @endif
                @if(session('warning_msg'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                        <h4><i class="icon fa fa-exclamation"></i> {{__('Warning')}}</h4>
                        {{ session('warning_msg') }}
                    </div>
                @endif
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-list"></i> {{ $pageTitle }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{__('No.')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('SKU')}}</th>
                                    <th>{{__('Product Name')}}</th>
                                    <th>{{__('Category')}}</th>
                                    <th>{{__('Price')}}</th>
                                    <th>{{__('Stock')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($products) > 0)
                                    @php $count = 0; @endphp
                                    @foreach($products as $product)
                                        @php $count++; @endphp
                                        <tr class="@if($product->status == 0) row-disabled @endif">
                                            <td width="5%" class="text-right">{{ $count; }}</td>
                                            <td width="10%" align="center">
                                                <div class="preview-image" style="width: 60px; height: 60px;">
                                                    <img src="@if(!empty($product->image)) {{ asset('storage/' . $product->image) }} @else {{ asset('admin/assets/dist/img/placeholder-upload.jpg') }} @endif" alt="Image">
                                                </div>
                                            </td>
                                            <td width="8%"><strong>{{ $product->sku }}</strong></td>
                                            <td width="28%">{{ $product->description->name }}</td>
                                            <td>
                                                @if(count($product->categories) > 0)
                                                    @foreach($product->categories as $category)
                                                        <small class="label bg-aqua">{{ $category->name }}</small> <br/>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                @if($product->price == 0)
                                                    <span style="color: #545454;">{{__('Contact')}}</span>
                                                @else
                                                    @if($product->original_price > 0)
                                                        <span style="color: #e3503e;">{{ number_format($product->original_price) }} vn<u>đ</u></span><br/>
                                                    @endif
                                                    <span style="color: #545454;"> {{ number_format($product->price) }}vn<u>đ</u></span>
                                                @endif
                                            </td>
                                            <td class="text-center"><strong class="text-blue">{{ number_format($product->quantity) }}</strong></td>
                                            <td class="text-center">
                                                {!! $product->status == App\Enums\PageProductStatus::ACTIVE ? '<small class="label bg-green">'.App\Enums\PageProductStatus::label(App\Enums\PageProductStatus::ACTIVE).'</small>' : '<small class="label bg-red">'.App\Enums\PageProductStatus::label(App\Enums\PageProductStatus::INACTIVE).'</small>' !!}
                                            </td>
                                            <td>
                                                <div style="display: flex;">
                                                    <a title="Chỉnh sửa sản phẩm" href="{{ route('admin.landing.product.edit', [$product->id]) }}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i></a>
                                                    <form 
                                                        action="{{route('admin.landing.product.destroy', [$product->id])}}"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xoá không?')">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">Giải thích</h3>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li>
                                Các ô được tô <small class="label" style="background-color: #D0D3D4; color: #252525;"> màu xám </small> là sản phẩm <strong>không hiển thị</strong> ngoài trang chủ.
                            </li>
                        </ul>
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