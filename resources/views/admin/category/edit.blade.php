@extends('admin.layouts.main')

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{__('Dashboard')}}</a></li>
            <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-th"></i> {{__('Categories')}}</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('admin.categories.update', $category->id) }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $category->id }}" name="id">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-sm mr-1" title="{{__('Save')}}"><i class="fa fa-save"></i> {{__('Save')}}</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-default btn-sm" title="{{__('Back')}}"><i class="fa fa-undo"></i> {{__('Back')}}</a>
                    </div>
                </div>
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert alert-error alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                        <h4><i class="fa fa-times-circle"></i> Lỗi</h4>
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
                                <div class="form-group @error('categoryName') has-error @enderror">
                                    <label><strong class="color-red font-15">*</strong> {{__('Category Name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('Enter category name')}}" value="{{ $category->name }}" name="categoryName">
                                    @error('categoryName')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('Parent Category')}}</label>
                                    <select name="parentId" class="form-control select2">
                                        <option value="0" @if($category->parent_id == 0) selected @endif>--- {{__('Root Category')}} ---</option>
                                        @foreach($categories as $item)
                                            <option
                                                value="{{ $item->id }}"
                                                @if($item->id == $category->parent_id)
                                                    selected
                                                @endif
                                            >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Description')}}</label>
                                    <textarea name="description" rows="8" class="form-control textarea" placeholder="{{__('Enter description')}}">{{ $category->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Image')}}</label>
                                    <div class="preview-image">
                                        <img src="@if(!empty($category->image)) {{ asset('storage/' . $category->image) }} @else {{ asset('images/default.jpg') }} @endif" alt="Image" id="preview">
                                    </div>
                                    <input type="file" onchange="filePreview(event)" class="form-control" name="file">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Position')}}</label>
                                    <input type="number" class="form-control" placeholder="{{__('Position')}}" value="{{ $category->sort_order }}" name="sortOrder">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Status')}}</label>
                                    <select name="status" class="form-control select2">
                                        <option value="{{App\Modules\Blog\Enums\PostStatusEnum::Active}}" @if($category->status == App\Modules\Blog\Enums\PostStatusEnum::Active) selected @endif>{{__('Active')}}</option>
                                        <option value="{{App\Modules\Blog\Enums\PostStatusEnum::Inactive}}" @if($category->status == App\Modules\Blog\Enums\PostStatusEnum::Inactive) selected @endif>{{__('Inactive')}}</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="seo">
                                <div class="form-group @error('metaTitle') has-error @enderror">
                                    <label><strong class="color-red font-15">*</strong> {{__('Meta Title')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('Enter meta title')}}" value="{{ $category->meta_title }}" name="metaTitle">
                                    @error('metaTitle')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('Meta Description')}}</label>
                                    <textarea class="form-control" rows="5" cols="40" name="metaDescription" placeholder="{{__('Enter meta description')}}">{{ $category->meta_description }}</textarea>
                                </div>
                                <div class="form-groupr">
                                    <label>{{__('Meta Keywords')}}</label>
                                    <textarea class="form-control" rows="5" cols="30" name="metaTagKeywords" placeholder="{{__('Enter meta keywords')}}">{{ $category->meta_keyword }}</textarea>
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
<script>
  $(function () {
    $('.textarea').wysihtml5();
    $('.select2').select2();
  })
</script>
@endsection