@extends('admin.layouts.main')

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{__('Dashboard')}}</a></li>
            <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-th"></i> {{__('Posts')}}</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm mr-1" title="{{__('Add New')}}"><i class="fa fa-plus"></i> {{__('Add New')}}</a>
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
                        <h3 class="box-title">{{ $pageTitle }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('No.')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Position')}}</th>
                                    <th>{{__('Created At')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach($posts as $post)
                                    @php $count++; @endphp
                                    <tr>
                                        <td width="5%" class="text-right">{{ $count }}</td>
                                        <td width="8%" align="center">
                                            <div class="preview-image" style="width: 60px; height: 60px;">
                                                <img src="@if(!empty($post->image)) {{ asset('storage/' . $post->image) }} @else {{ asset('images/default.jpg') }} @endif" alt="Image">
                                            </div>
                                        </td>
                                        <td width="30%"><a href="{{ route('admin.posts.edit', [$post->id]) }}">{{ $post->title }}</a></td>
                                        <td class="text-center">{{ $post->sort_order }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            @if($post->status == 1)
                                                <small class="label bg-blue">{{__('Published')}}</small>
                                            @else
                                                <small class="label bg-yellow">{{__('Draft')}}</small>
                                            @endif
                                        </td>
                                        <td width="10%">
                                            <div class="d-flex">
                                                <a href="{{ route('admin.posts.edit', [$post->id]) }}" class="btn btn-primary btn-sm mr-1" title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="{{__('Delete')}}" onclick="return confirm('{{__('Are you sure you want to delete this post? Delete?')}}');"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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