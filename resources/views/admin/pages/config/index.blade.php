@extends('admin.common.layout')

@section('title')
    {!! $headingTitle !!}
@endsection

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.config.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu cấu hình</button>
                    </div>
                    @if(session('successMsg'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                            {{ session('successMsg') }}
                        </div>
                    @endif
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Chung</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Giao diện</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Mạng xã hội</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Cấu hình Gmail</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="form-group">
                                    <label>Tiêu đề trang</label>
                                    <input type="text" class="form-control" name="meta_title" placeholder="Nhập tiêu đề trang" value="{!! $configs['meta_title'] !!}">
                                </div>
                                <div class="form-group">
                                    <label>Chào mừng</label>
                                    <input type="text" class="form-control" name="welcome_text" placeholder="Nhập các câu chào mừng cách nhau dấu phẩy" value="{!! $configs['welcome_text'] !!}">
                                </div>
                                <div class="form-group">
                                    <label>Favicon</label>
                                    <div class="preview-image">
                                        <img id="favicon-preview" src="@if(!empty($configs['favicon'])){{ asset('storage/' . $configs['favicon']) }} @else {{ asset('admin/assets/dist/img/placeholder-upload.jpg') }} @endif" alt="Favicon" id="favicon-preview">
                                    </div>
                                    <input type="file" class="form-control" name="favicon" onchange="imagePreview(event, 'favicon-preview');">
                                </div>                               
                                <div class="form-group">
                                    <label>Logo</label>
                                    <div class="preview-image">
                                        <img id="logo-preview" src="@if(!empty($configs['logo'])){{ asset('storage/' . $configs['logo']) }} @else {{ asset('admin/assets/dist/img/placeholder-upload.jpg') }} @endif" alt="Logo" id="logo-preview">
                                    </div>
                                    <input type="file" class="form-control" name="logo" onchange="imagePreview(event, 'logo-preview');">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="meta_description" class="form-control textarea">{!! $configs['meta_description'] !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Từ khóa</label>
                                    <input type="text" class="form-control" name="meta_keyword" placeholder="Nhập danh sách từ khóa" value="{{ $configs['meta_keyword'] }}">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung chân trang</label>
                                    <textarea name="contact" class="form-control" id="editor1">{!! $configs['contact'] !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Điện thoại</label>
                                    <input type="text" class="form-control" name="phone" placeholder="+84" value="{{ $configs['phone'] }}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Address')}}</label>
                                    <input type="text" class="form-control" name="address" placeholder="{{__('Address')}}" value="{{ $configs['address'] ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Copyright</label>
                                    <input type="text" class="form-control" name="copyright_text" placeholder="Nhập thông báo về bản quyền" value="{{ $configs['copyright_text'] }}">
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <p>Tất những đoạn code dưới đây sẽ được cài đặt vào phần dưới của thẻ <span class="label label-primary">&lt;header&gt;</span></p>
                                    <textarea name="header_embed_code" class="form-control" rows="8" placeholder="Dán đoạn <srcipt> phần header vào đây">{{ $configs['header_embed_code'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <p>Tất những đoạn code dưới đây sẽ được cài đặt vào phần trong của thẻ <span class="label label-primary">&lt;body&gt;</span></p>
                                    <textarea name="footer_embed_code" class="form-control" rows="8" placeholder="Dán đoạn <srcipt> phần body vào đây">{{ $configs['footer_embed_code'] }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="form-group">
                                    <label>Gmail</label>
                                    <input type="text" class="form-control" name="gmail" placeholder="example@gmail.com" value="{{ $configs['gmail'] }}">
                                </div>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="facebook" placeholder="URL Fanpage của bạn" value="{{ $configs['facebook'] }}">
                                </div>
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" name="youtube" placeholder="URL Profile kênh Youtube của bạn" value="{{ $configs['youtube'] }}">
                                </div>
                                <div class="form-group">
                                    <label>Zalo</label>
                                    <input type="text" class="form-control" name="zalo" placeholder="Số điện thoại Zalo" value="{{ $configs['zalo'] }}">
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" name="instagram" placeholder="URL Instagram của bạn" value="{{ $configs['instagram'] }}">
                                </div>
                                <div class="form-group">
                                    <label>Tiktok</label>
                                    <input type="text" class="form-control" name="tiktok" placeholder="URL Tiktok của bạn" value="{{ $configs['tiktok'] }}">
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" name="twitter" placeholder="URL Twitter của bạn" value="{{ $configs['twitter'] }}">
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_4">
                                <div class="form-group">
                                    <label>Mail nhận tin</label>
                                    <input type="text" class="form-control" name="mail_receiver" placeholder="example@gmail.com" value="{{ $configs['mail_receiver'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('script')
<!-- CK Editor -->
<script src="{{ asset('admin/assets/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
        // Initialize Select2 Elements
        $('.select2').select2()

        // Editor
        $('.textarea').wysihtml5()
        var options = {
            filebrowserImageBrowseUrl: '{{ route("getAdminLogin") }}/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '{{ route("getAdminLogin") }}/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '{{ route("getAdminLogin") }}/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '{{ route("getAdminLogin") }}/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('editor1', options);
    })
</script>
@endsection