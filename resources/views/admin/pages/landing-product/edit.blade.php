@extends('admin.common.layout')

@section('title')
{!! $headingTitle !!}
@endsection

@section('content')
    <div data-page="page-products.index" id="page-products-index">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ $pageTitle }}</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-th"></i> {{__('Dashboard')}}</a></li>
                <li><a href="{{route('admin.landing.product.index')}}"><i class="fa fa-cubes"></i> {{__('Product')}}</a></li>
                <li class="active">{{ $pageTitle }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('admin.landing.product.update', [$product->id]) }}" role="form" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $product->id }}" name="id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary btn-sm mr-1" title=" {{__('Save')}}"><i class="fa fa-save"></i> {{__('Save')}}</button>
                            <a href="{{ route('admin.landing.product.index') }}" class="btn btn-default btn-sm" title="{{__('Back')}}"><i class="fa fa-undo"></i> {{__('Back')}}</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @if ($errors->any())
                        <div class="alert alert-error alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                            <h4><i class="fa fa-times-circle"></i> Lỗi</h4>
                            Có vẻ như bạn điền chưa đầy đủ thông tin. Hãy kiểm tra lại nhé!
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#general" data-toggle="tab">Chung</a></li>
                                <li><a href="#data" data-toggle="tab">Dữ liệu</a></li>
                                <li><a href="#image" data-toggle="tab">Hình ảnh</a></li>
                                <li><a href="#links" data-toggle="tab">Liên kết</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="general">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label><strong class="color-red font-15">*</strong> Tên sản phẩm</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ $product->description->name }}" name="name">
                                        @error('name')
                                        <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ngắn</label>
                                        <textarea name="description" rows="8" class="form-control textarea" placeholder="Nhập mô tả">{{ $product->description->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết sản phẩm</label>
                                        <textarea name="detail" rows="8" class="form-control" id="editor1" placeholder="Nhập nội dung bài viết">{{ $product->description->detail }}</textarea>
                                    </div>
                                    <div class="form-group @error('metaTitle') has-error @enderror">
                                        <label><strong class="color-red font-15">*</strong> Thẻ tiêu đề</label>
                                        <input type="text" class="form-control" placeholder="Nhập thẻ tiêu đề" value="{{ $product->description->meta_title }}" name="metaTitle">
                                        @error('metaTitle')
                                        <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Thẻ mô tả ngắn</label>
                                        <textarea class="form-control" rows="6" cols="40" name="metaDescription" placeholder="Nhập thẻ mô tả ngắn">{{ $product->description->meta_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Từ khóa</label>
                                        <textarea class="form-control" rows="6" cols="40" name="metaKeywords" placeholder="Nhập từ khóa tìm kiếm trên Google">{{ $product->description->meta_keyword }}</textarea>
                                    </div>
                                    <div class="form-groupr">
                                        <label>Thẻ Tag</label>
                                        <input type="text" class="form-control" name="productTag" placeholder="VD: Tag 1, Tag 2,.." value="{{ $product->description->tag }}">
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data">
                                    <div class="form-group  @error('sku') has-error @enderror">
                                        <label>Mã sản phẩm - SKU</label>
                                        <input type="text" class="form-control" placeholder="Nhập mã sản phẩm" value="{{ $product->sku }}" name="sku">
                                        @error('sku')
                                        <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('categories') has-error @enderror">
                                        <label><strong class="color-red font-15">*</strong> Danh mục</label>
                                        <select name="categories[]" class="form-control select2" multiple="multiple" data-placeholder="Chọn danh mục" style="width: 100%;">
                                            @foreach($categories as $item)
                                            <option value="{{ $item->id }}" {{ in_array($item->id, $productToCategories) ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('categories')
                                        <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Giá gốc</label>
                                        <input type="number" class="form-control" placeholder="Nhập giá gốc" value="{{ $product->original_price }}" name="originalPrice">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <input type="number" class="form-control" placeholder="Nhập giá bán ra" value="{{ $product->price }}" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label>Tồn kho</label>
                                        <input type="number" class="form-control" placeholder="Nhập số lượng tồn kho" value="{{ $product->quantity }}" name="quantity">
                                    </div>
                                    <div class="form-group">
                                        <label>Tình trạng tồn kho</label>
                                        <select name="stockStatus" class="form-control select2" style="width: 100%;">
                                            @foreach($status as $item)
                                            <option value="{{ $item->id }}" @if($product->stock_status_id == $item->id)
                                                selected
                                                @endif
                                                >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm nổi bật</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="featured" value="1" class="minimal" @if($product->featured == 1) checked @endif>
                                                Có
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="featured" value="0" class="minimal" @if($product->featured == 0) checked @endif>
                                                Không
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tình trạng sản phẩm</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="1" class="minimal" @if($product->status == 1) checked @endif>
                                                Đang bán
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="0" class="minimal" @if($product->status == 0) checked @endif>
                                                Ngừng bán
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hiển trị trang chủ</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="display" value="1" class="minimal" @if($product->display == 1) checked @endif>
                                                Hiển thị
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="display" value="0" class="minimal" @if($product->display == 0) checked @endif>
                                                Ẩn sản phẩm
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="image">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <div class="preview-image">
                                            <img src="@if(!empty($product->image)) {{ asset('storage/' . $product->image) }} @else {{ asset('admin/assets/dist/img/placeholder-upload.jpg') }} @endif" alt="Image" id="imagePreview">
                                        </div>
                                        <input type="file" class="form-control" id="imageInput" name="image">
                                    </div>
                                    <table class="table table-bordered table-striped" id="UploadImageTbl">
                                        <thead>
                                            <tr>
                                                <th>{{__('Image')}}</th>
                                                <th width="30%">{{__('Sort Order')}}</th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="displayImageList"></tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <input type="file" id="imageUpload" class="form-control" accept="image/*" multiple>
                                                    <div id="error" class="text-danger"></div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="sort_order" placeholder="Nhập vị tri sắp xếp" value="0">
                                                </td>
                                                <td><button type="button" title="Thêm ảnh" class="btn btn-primary btn-sm btn-upload-image"><i class="fa fa-plus-circle"></i></button></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="links">
                                    <div class="form-group">
                                        <label>Liên kết shopee</label>
                                        <input type="text" class="form-control" placeholder="Nhập đường dẫn sản phẩm" value="{{ $product->shopee_link }}" name="shopeeLink">
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
<!-- CK Editor -->
<script src="{{ asset('admin/assets/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    const AddProductAdminJs = {
        init() {
            this.initEvents();
        },

        initEvents() {
            // Initialize Select2 Elements
            $('.select2').select2();
            $('.textarea').wysihtml5();

            // iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
                , radioClass: 'iradio_minimal-blue'
            });

            CKEDITOR.replace('editor1', {
                filebrowserImageBrowseUrl: '/th-admin/laravel-filemanager?type=Images'
                , filebrowserImageUploadUrl: '/th-admin/laravel-filemanager/upload?type=Images&_token='
                , filebrowserBrowseUrl: '/th-admin/laravel-filemanager?type=Files'
                , filebrowserUploadUrl: '/th-admin/laravel-filemanager/upload?type=Files&_token='
            });

            this.loadAdditionalImage();
            this.handleUploadImage();
            this.handleDeleteImage();
        },

        handleUploadImage() {
            let _this = this;

            $('#UploadImageTbl').find('.btn-upload-image').on('click', function() {
                const inputFiles = $('#imageUpload')[0];
                const files = inputFiles.files;

                if (!files || files.length === 0) {
                    $('#error').text('Vui lòng chọn ít nhất 1 ảnh');
                    return;
                }

                $('#error').text('');

                let formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('product_id', $('input[name="id"]').val());
                formData.append('sort_order', $('input[name="sort_order"]').val());

                for (let i = 0; i < files.length; i++) {
                    formData.append('images[]', files[i]);
                }

                $.ajax({
                    url: "{{route('admin.landing.product.image.upload')}}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if (res.success) {
                            alert(res.message);
                            $('#imageUpload').val('');

                            _this.loadAdditionalImage();
                        }
                    },
                    error: function (xhr) {
                        $('#error').text('Upload thất bại');
                    }
                });
            });
        },

        loadAdditionalImage() {
            var productId = $('input[name="id"]').val();

            $.ajax({
                url: `/th-admin/landing-product/image/list/${productId}`,
                type: "GET",
                data: {},
                success: function (res) {
                    if (res.success) {
                        $('.displayImageList').html(res.data);
                    }
                },
                error: function (xhr) {
                    $('#error').text('Lấy danh sách hình ảnh thất bại');
                }
            });
        },

        handleDeleteImage() {
            let _this = this;

            $(document).on('click', '.btn-delete', function () {
                let btn = $(this);
                let url = btn.data('url');
                let row = btn.closest('tr');

                if (!confirm('Bạn có chắc chắn muốn xoá hình ảnh này?')) return;

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function (res) {
                        if (res.success) {
                            _this.loadAdditionalImage();
                        }
                    }
                });
            });
        }
    }

    $(function() {
        AddProductAdminJs.init();
    });
</script>
@endsection
