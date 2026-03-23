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
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm mr-1" title="{{__('Add New')}}"><i class="fa fa-plus"></i> {{__('Add New')}}</a>
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
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Position')}}</th>
                                    <th>{{__('Parent Category')}}</th>
                                    <th>{{__('Created At')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach($categories as $category)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="Image" class="img-thumbnail" width="100">
                                        </td>
                                        <td>{{ $category->sort_order }}</td>
                                        <td>{{ $category->parent->name }}</td>
                                        <td>{{ vn_datetime($category->created_at) }}</td>
                                        <td>
                                            @if(App\Modules\Blog\Enums\PostStatusEnum::Active == $category->status)
                                                <span class="label label-success">{{__('Active')}}</span>
                                            @else
                                                <span class="label label-danger">{{__('Inactive')}}</span>
                                            @endif
                                        </td>
                                        <td width="10%">
                                            <div class="d-flex">
                                                <a href="{{ route('admin.categories.edit', [$category->id]) }}" class="btn btn-primary btn-sm mr-1" title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="{{__('Delete')}}" onclick="return confirm('{{__('Are you sure you want to delete this category? Delete?')}}');"><i class="fa fa-trash"></i></button>
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