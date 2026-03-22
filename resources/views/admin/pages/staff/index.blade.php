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
            <li><a href="{{ route('admin.theme.staff.index') }}">Nhân sự</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('admin.theme.staff.postAdd') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-sm mr-1" title="Lưu lại"><i class="fa fa-plus"></i> Tạo nhân sự mới</button>
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
                            <h3 class="box-title">Tạo nhân sự mới</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group @error('staffName') has-error @enderror">
                                <label><strong class="color-red font-15">*</strong>Tên nhân sự</label>
                                <input type="text" class="form-control" placeholder="Nhập tên nhân sự" value="{{ old('staffName') }}" name="staffName">
                                @error('staffName')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group @error('staffPosition') has-error @enderror">
                                <label>Tên chức vụ - bộ phận</label>
                                <input type="text" class="form-control" placeholder="Nhập tên chức vụ - bộ phận" value="{{ old('staffPosition') }}" name="staffPosition">
                                @error('staffPosition')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <div class="preview-image">
                                    <img src="{{ asset('storage/uploads/default.png') }}" alt="Image" id="preview">
                                </div>
                                <input type="file" onchange="filePreview(event)" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung - Lời nhắn</label>
                                <textarea name="staffMessage" cols="30" rows="10" class="form-control textarea">{{ old('staffMessage') }}</textarea>
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
                    <div class="box box-primary box-solid">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách nhân sự</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên nhân sự</th>
                                        <th>Chức vụ - Bộ phận</th>
                                        <th>Vị trí</th>
                                        <th>Trang chủ</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($staffs) > 0)
                                        @php $count = 0; @endphp
                                        @foreach($staffs as $staff)
                                            @php $count++; @endphp
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td width="10%" align="center">
                                                    <div class="preview-image" style="width: 60px; height: 60px;">
                                                        <img src="@if(!empty($staff->staff_image)) {{ asset('storage/' . $staff->staff_image) }} @else {{ asset('storage/uploads/default.png') }} @endif" alt="Avatar">
                                                    </div>
                                                </td>
                                                <td>{{ $staff->staff_name }}</td>
                                                <td><strong>{{ $staff->staff_position }}</strong></td>
                                                <td align="center">{{ $staff->sort_order }}</td>
                                                <td>{!! $staff->status == 1 ? '<small class="label bg-blue">Có</small>' : '<small class="label bg-red">Không</small>' !!}</td>
                                                <td>
                                                    <a href="{{ route('admin.theme.staff.getEdit', [$staff->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a
                                                        href="{{ route('admin.theme.staff.getDelete', [$staff->id]) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Bạn có thật sự muốn xóa nhân sự này. Xóa?')"
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