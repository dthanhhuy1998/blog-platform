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
        <form action="{{ route('admin.theme.staff.postEdit') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $staff->id }}" name="id">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-sm mr-1" title="Lưu lại"><i class="fa fa-save"></i> Lưu lại</button>
                        <a href="{{ route('admin.theme.staff.index') }}" class="btn btn-default btn-sm" title="Quay lại"><i class="fa fa-undo"></i> Quay lại</a>
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
                <div class="col-md-12">
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $pageTitle }}</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group @error('staffName') has-error @enderror">
                                <label><strong class="color-red font-15">*</strong>Tên nhân sự</label>
                                <input type="text" class="form-control" placeholder="Nhập tên nhân sự" value="{{ $staff->staff_name }}" name="staffName">
                                @error('staffName')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group @error('staffPosition') has-error @enderror">
                                <label>Tên chức vụ - bộ phận</label>
                                <input type="text" class="form-control" placeholder="Nhập tên chức vụ - bộ phận" value="{{ $staff->staff_position }}" name="staffPosition">
                                @error('staffPosition')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <div class="preview-image">
                                <img src="@if(!empty($staff->staff_image)) {{ asset('storage/' . $staff->staff_image) }} @else {{ asset('storage/uploads/default.png') }} @endif" alt="Image" id="preview">
                                </div>
                                <input type="file" onchange="filePreview(event)" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung - Lời nhắn</label>
                                <textarea name="staffMessage" cols="30" rows="10" class="form-control textarea">{{ $staff->staff_message }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Vị trí</label>
                                <input type="number" class="form-control" value="{{ $staff->sort_order }}" name="sortOrder">
                            </div>
                            <div class="form-group">
                                <label>Hiển trị trang chủ</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="1" @if($staff->status == 1) checked @endif>
                                        Có
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="0" @if($staff->status == 0) checked @endif>
                                        Không
                                    </label>
                                </div>
                            </div>
                        </div>
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
    $('.textarea').wysihtml5()
  })
</script>
@endsection