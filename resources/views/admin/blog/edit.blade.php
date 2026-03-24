@extends('admin.layouts.main')

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{__('Dashboard')}}</a></li>
            <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-th"></i> {{__('Posts')}}</a></li>
            <li class="active">{{ $pageTitle ?? '' }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('admin.posts.update', $post->id) }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $post->id }}" name="id">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-sm mr-1" title="{{__('Save')}}"><i class="fa fa-save"></i> {{__('Save')}}</button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-default btn-sm" title="{{__('Cancel')}}"><i class="fa fa-undo"></i> {{__('Cancel')}}</a>
                    </div>
                </div>
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-error alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                            <h4><i class="fa fa-times-circle"></i> {{__('Error')}}</h4>
                            {{__('Something went wrong. Please try again.')}}
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#general" data-toggle="tab">{{__('General')}}</a></li>
                            <li><a href="#seo" data-toggle="tab">{{__('SEO')}}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="general">
                                <div class="form-group @error('title') has-error @enderror">
                                    <label><strong class="color-red font-15">*</strong> {{__('Title')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('Enter title')}}" value="{{ $post->title }}" name="title">
                                    @error('title')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong class="color-red font-15">*</strong> {{__('Categories')}}</label>
                                    <select name="categories[]" class="form-control select2" multiple="multiple" data-placeholder=" {{__('Select categories')}}" style="width: 100%;">
                                        @foreach($categories as $item)
                                            <option
                                                value="{{ $item->id }}"
                                                {{ in_array($item->id, old('categories', $selectedCategories)) ? 'selected' : '' }}
                                            >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Summary')}}</label>
                                    <textarea name="summary" rows="8" class="form-control textarea" placeholder="{{__('Enter summary')}}">{{ $post->summary }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Content')}}</label>
                                    <textarea name="content" rows="8" class="form-control" id="editor1" placeholder="{{__('Enter content')}}">{{ $post->content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Image')}}</label>
                                    <div class="preview-image">
                                        <img src="@if(!empty($post->image)) {{ asset('storage/' . $post->image) }} @else {{ asset('images/default.jpg') }} @endif" alt="Image" id="preview">
                                    </div>
                                    <input type="file" onchange="filePreview(event)" class="form-control" name="file">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Position')}}</label>
                                    <input type="number" class="form-control" placeholder="Vị trí" value="{{ $post->sort_order }}" name="sortOrder">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Status')}}</label>
                                    <select name="status" class="form-control select2">
                                        <option value="{{App\Modules\Blog\Enums\PostStatusEnum::Active}}" @if($post->status == App\Modules\Blog\Enums\PostStatusEnum::Active) selected @endif>{{__('Active')}}</option>
                                        <option value="{{App\Modules\Blog\Enums\PostStatusEnum::Inactive}}" @if($post->status == App\Modules\Blog\Enums\PostStatusEnum::Inactive) selected @endif>{{__('Inactive')}}</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="seo">
                                <div class="form-group @error('metaTitle') has-error @enderror">
                                    <label><strong class="color-red font-15">*</strong> {{__('Meta Title')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('Enter meta title')}}" value="{{ $post->meta_title }}" name="metaTitle">
                                    @error('metaTitle')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('Meta Description')}}</label>
                                    <textarea class="form-control" rows="5" cols="40" name="metaDescription" placeholder="{{__('Enter meta description')}}">{{ $post->meta_description }}</textarea>
                                </div>
                                <div class="form-groupr">
                                    <label>{{__('Meta Keywords')}}</label>
                                    <textarea class="form-control" rows="5" cols="30" name="metaTagKeywords" placeholder="{{__('Enter meta keywords')}}">{{ $post->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('script')
<!-- CK Editor -->
<script src="{{ asset('backend/assets/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
        // Initialize Select2 Elements
        $('.select2').select2()

        // Editor
        $('.textarea').wysihtml5()
        var options = {
            filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/admin/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/admin/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/admin/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('editor1', options);
    })
</script>
@endsection