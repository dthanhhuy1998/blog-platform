@extends('admin.layouts.main')

@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ $titlePage }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> {{__('Dashboard')}}</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ number_format($postTotal) }}</h3>
                        <p>{{__('Post Total')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <a href="{{ route('admin.posts.index') }}" class="small-box-footer">{{__('View Detail')}} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('storage/admin/assets/dist/js/pages/dashboard.js') }}"></script>

<script>
    $(function () {
        $('#datatable').DataTable();
    })
</script>
@endsection