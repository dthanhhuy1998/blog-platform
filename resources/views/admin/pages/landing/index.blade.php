@extends('admin.common.layout')

@section('title')
{!! $headingTitle !!}
@endsection

@section('style')
<style>
    .datatable-actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .datatable-actions form {
        margin: 0;
    }
</style>
@endsection

@section('content')
  <div data-page="pages.index">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>{{ $pageTitle }}</h1>
          <ol class="breadcrumb">
              <li><a href="{{ route('admin.index') }}"><i class="fa fa-th"></i> {{__('Homepage')}}</a></li>
              <li><a href="#"><i class="fa fa-ticket"></i> {{__('Voucher Manager')}}</a></li>
              <li class="active">{{ $pageTitle }}</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {{-- <div class="col-md-12">
                  <div class="btn-group">
                      <button class="btn btn-primary btn-sm mr-1" data-action="btn-create" title="{{__('Add New')}}"><i class="fa fa-plus"></i> {{__('Add New')}}</button>
                  </div>
              </div> --}}
              <div class="col-md-12">
                  <div class="box box-primary box-solid">
                      <div class="box-header">
                          <h3 class="box-title">{{ $pageTitle }}</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <table id="datatable" class="table table-bordered table-striped" style="width: 100%;">
                              <thead>
                                  <tr>
                                      <th>{{__('Template')}}</th>
                                      <th>{{__('Title')}}</th>
                                      <th>{{__('Slug')}}</th>
                                      <th>{{__('Status')}}</th>
                                      <th>{{__('Created At')}}</th>
                                      <th>{{__('Action')}}</th>
                                  </tr>
                              </thead>
                              <tbody></tbody>
                          </table>
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
              </div>
          </div>
      </section>
      <!-- /.content -->

      <div class="modal fade" id="voucherModal" tabindex="-1" role="dialog">
          <div class="modal-dialog">
              <form  id="voucherForm" class="modal-content" enctype="multipart/form-data">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">x</button>
                      <h4 class="modal-title" id="voucherModalTitle" data-title="{{__('Add New')}}"></h4>
                  </div>
                  <div class="modal-body">
                      @csrf
                      <input type="hidden" name="_mode" value="create">
                      <input type="hidden" name="id">

                      <div class="form-group">
                          <label>{{__('Voucher Code')}} <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="code" autocomplete="off">
                      </div>

                      <div class="form-group">
                          <label>{{__('Type')}} <span class="text-danger">*</span></label>
                          <select name="type" class="form-control select2 js-discount-type">
                              @foreach(\App\Enums\VoucherType::options() as $typeKey => $typeValue)
                                  <option value="{{ $typeKey }}">{{\App\Enums\VoucherType::label($typeKey)}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label>{{__('Value')}} <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="value" autocomplete="off">
                      </div>

                      <div class="form-group">
                          <label>{{__('Description')}}</label>
                          <textarea name="description" class="form-control" rows="5"></textarea>
                      </div>

                      <div class="form-group">
                          <label>{{__('Status')}} <span class="text-danger">*</span></label>
                          <select name="is_active" class="form-control select2">
                              @foreach(\App\Enums\VoucherStatus::options() as $statusKey => $statusValue)
                                  <option value="{{ $statusKey }}">{{\App\Enums\VoucherStatus::label($statusKey)}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
                      <button class="btn btn-primary" type="submit" data-action="voucher-submit">{{__('Save')}}</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('script')
    <script src="{{asset('vendor/jquery-validation/jquery.validate.js')}}"></script>
@endsection