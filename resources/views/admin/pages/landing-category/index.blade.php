@extends('admin.common.layout')

@section('title')
    {!! $headingTitle !!}
@endsection

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $pageTitle }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-th"></i> {{__('Dashboard')}}</a></li>
            <li><a href="{{ route('admin.landing.index') }}"><i class="fa fa-paint-brush"></i> {{__('Page Management')}}</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="{{ route('admin.landing.category.create') }}" class="btn btn-primary btn-sm mr-1" title="{{__('Add New')}}"><i class="fa fa-plus"></i> {{__('Add New')}}</a>
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
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('No.')}}</th>
                                    <th>{{__('Category')}}</th>
                                    <th>{{__('Sort Order')}}</th>
                                    <th>{{__('Created At')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach($data as $item)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->sort_order }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if($item->status == App\Enums\PageCategoryStatus::ACTIVE)
                                                <small class="label bg-green">{{__('Active')}}</small>
                                            @else
                                                <small class="label bg-red">{{__('Inactive')}}</small>
                                            @endif
                                        </td>
                                        <td width="10%">
                                            <a href="{{ route('admin.landing.category.edit', [$item->id]) }}" class="btn btn-primary btn-sm" title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.landing.category.delete', [$item->id]) }}" class="btn btn-danger btn-sm" title="{{__('Delete')}}" onclick="return confirm('Bạn có chắn chắn muốn xóa danh mục này. Xóa?');"><i class="fa fa-trash"></i></a>
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