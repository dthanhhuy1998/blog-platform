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
            <li><a href="#"><i class="fa fa-th"></i> Hệ thống phân phối</a></li>
            <li class="active">{{ $pageTitle }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="#" class="btn btn-primary btn-sm mr-1 btn-create" title="Thêm mới"><i class="fa fa-plus"></i> Thêm mới</a>
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
                @if(session('warning_msg'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" control-id="ControlID-6">×</button>
                    <h4><i class="icon fa fa-exclamation"></i> Cảnh báo</h4>
                    {{ session('warning_msg') }}
                </div>
                @endif
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-list"></i> {{ $pageTitle }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tỉnh/Thành phố</th>
                                    <th>Tên</th>
                                    <th>Địa chỉ</th>
                                    <th>Link bản đồ</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach($distributionSystemData as $dis)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $dis->related_province }}</td>
                                        <td><span class="text-blue">{{ $dis->name }}</span></td>
                                        <td>{{ $dis->address }}</td>
                                        <td>{{ $dis->map_link }}</td>
                                        <td>{{ date_vi($dis->created_at) }}</td>
                                        <td width="10%">
                                            <a href="{{ route('distribution-system.show', [$dis->id]) }}" route-update="{{ route('distribution-system.update', [$dis->id]) }}" class="btn btn-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm btn-delete" title="Xóa bỏ">
                                                <i class="fa fa-trash"></i>
                                                <form action="{{ route('distribution-system.destroy', [$dis->id]) }}" method="DELETE">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $dis->id }}">
                                                </form>
                                            </a>
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

    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <form action="{{ route('distribution-system.store') }}" method="POST" class="modal-content" id="create-form">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Tạo hệ thống phân phối</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tỉnh/TP</label>
                        <select name="related_city_code" id="" class="form-control">
                            <option value="">-- Chọn Tỉnh/TP --</option>
                            @if (count($provinces) > 0)
                                @foreach($provinces as $province)
                                    <option value="{{ $province->matp }}">{{ $province->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ hệ thống</label>
                        <textarea class="form-control" name="address" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Link bản đồ</label>
                        <input type="text" class="form-control" name="map_link" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tạo mới</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <form action="" method="PUT" class="modal-content" id="edit-form">
                @csrf
                <input type="hidden" name="route_update" value="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Chỉnh sửa hệ thống phân phối</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tỉnh/TP</label>
                        <select name="related_city_code" id="" class="form-control">
                            <option value="">-- Chọn Tỉnh/TP --</option>
                            @if (count($provinces) > 0)
                                @foreach($provinces as $province)
                                    <option value="{{ $province->matp }}">{{ $province->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ hệ thống</label>
                        <textarea class="form-control" name="address" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Link bản đồ</label>
                        <input type="text" class="form-control" name="map_link" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(function () {
        $('#datatable').DataTable();

        $('.btn-create').on('click', function(e) {
            e.preventDefault();
            
            $('#modal-create').modal('show');
        });

        $('#create-form').on('submit', function(e) {
            e.preventDefault();

            var form = $('#create-form');

            var name = form.find('input[name="name"]').val();
            var cityCode = form.find('select[name="related_city_code"]').val();

            if (name == '' || cityCode == '') {
                alert('Vui lòng nhập đầy đủ thông tin');
                return;
            }

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                dataType: 'json',
                data: form.serialize(),
                success: function(res) {
                    if (res.status == 200) {
                        setTimeout(function() { 
                            location.href = res.redirect;
                        }, 1500);
                    }
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });

        $('body').on('click', '.btn-edit', function(e) {
            e.preventDefault();

            let route = $(this).attr('route-update');

            $.ajax({
                url: $(this).attr('href'),
                method: 'GET',
                dataType: 'json',
                success: function(res) {
                    if (res.status == 200) {
                        var formEdit = $('#modal-edit');

                        formEdit.find('input[name="route_update"]').val(route);
                        formEdit.find('select[name="related_city_code"]').html(res.data.related_city_code);
                        formEdit.find('input[name="name"]').val(res.data.name);
                        formEdit.find('textarea[name="address"]').val(res.data.address);
                        formEdit.find('input[name="map_link"]').val(res.data.map_link);

                        formEdit.modal('show');
                    }

                    if (res.status == 'E0') {
                        alert(res.message);
                    }
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });

        $('#edit-form').on('submit', function(e) {
            e.preventDefault();

            var form = $('#edit-form');

            var name = form.find('input[name="name"]').val();
            var cityCode = form.find('select[name="related_city_code"]').val();

            if (name == '' || cityCode == '') {
                alert('Vui lòng nhập đầy đủ thông tin');
                return;
            }

            $.ajax({
                url: form.find('input[name="route_update"]').val(),
                method: 'PUT',
                dataType: 'json',
                data: form.serialize(),
                success: function(res) {
                    if (res.status == 200) {
                        setTimeout(function() { 
                            location.href = res.redirect;
                        }, 1500);
                    }
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });

        $('body').on('click', '.btn-delete', function(e) {
            e.preventDefault();

            if (confirm('Bạn có thật sự muốn xoá không?')) {
                var form = $(this).find('form');

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    dataType: 'json',
                    data: form.serialize(),
                    success: function(res) {
                        if (res.status == 200) {
                            setTimeout(function() { 
                                location.href = res.redirect;
                            }, 1500);
                        }

                        if (res.status == 'E0') {
                            alert(res.message);
                        }
                    },
                    error: function(err) {
                        console.error(err);
                    }
                });
            }
        });
    });
</script>
@endsection