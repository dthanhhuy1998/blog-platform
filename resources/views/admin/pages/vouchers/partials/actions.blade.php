<div class="d-flex align-items-center gap-2 datatable-actions">
    <button type="button" class="btn btn-sm btn-primary btn-edit" data-id="{{ $item->id }}" data-title="{{__('Edit :module: ', ['module' => __('Voucher')])}} {{$item->code}}">
        <i class="fa fa-edit"></i>
    </button>
    <form action="" data-id="{{$item->id}}" method="POST" class="d-inline voucherFormDelete">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" title="{{__('Delete')}}">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</div>
