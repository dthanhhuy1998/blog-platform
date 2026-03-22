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
            <li><a href="#"><i class="fa fa-paint-brush"></i> Giao diện</a></li>
            <li><a href="{{ route('admin.theme.partner.index') }}">Khách hàng - Đối tác</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('admin.theme.partner.postAdd') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-sm mr-1" title="Tạo mới"><i class="fa fa-plus"></i> Tạo mới</button>
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
                </div>
                <div class="col-md-4">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tạo khách hàng - đổi tác mới</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group @error('image') has-error @enderror">
                                <label>Ảnh đại diện</label>
                                <div class="preview-image">
                                    <img src="{{ asset('storage/uploads/default.png') }}" alt="Image" id="preview">
                                </div>
                                <input type="file" onchange="filePreview(event)" class="form-control" name="image">
                                @error('image')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label>Liên kết</label>
                                <input type="text" class="form-control" placeholder="https://xpak.vn/" name="link">
                            </div>
                            <div class="form-group">
                                <label>Vị trí</label>
                                <input type="number" class="form-control" value="0" name="sortOrder">
                            </div>
                            <div class="form-group">
                                <label>Hiển trị trang chủ</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="1" checked>
                                        Có
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="0">
                                        Không
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách khách hàng - đối tác</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Liên kết</th>
                                        <th>Vị trí</th>
                                        <th>Trang chủ</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($partners) > 0)
                                        @php $count = 0; @endphp
                                        @foreach($partners as $partner)
                                            @php $count++; @endphp
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td width="10%" align="center">
                                                    <div class="preview-image" style="width: 60px; height: 60px;">
                                                        <img src="@if(!empty($partner->image)) {{ asset('storage/' . $partner->image) }} @else {{ asset('storage/uploads/default.png') }} @endif" alt="Avatar">
                                                    </div>
                                                </td>
                                                <td><a href="{{ $partner->link }}" target="_blank">{{ $partner->link }}</a></td>
                                                <td align="center">{{ $partner->sort_order }}</td>
                                                <td>{!! $partner->status == 1 ? '<small class="label bg-blue">Có</small>' : '<small class="label bg-red">Không</small>' !!}</td>
                                                <td>
                                                    <a href="{{ route('admin.theme.partner.getEdit', [$partner->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a
                                                        href="{{ route('admin.theme.partner.getDelete', [$partner->id]) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Bạn có thật sự muốn xóa khách hàng - đối tác này. Xóa?')"
                                                    ><i class="fa fa-trash"></i>
                                                    </a>
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
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('script')
<script>
  $(function () {
    $('#datatable').DataTable();
    $('.textarea').wysihtml5()
  })
</script>
@endsection