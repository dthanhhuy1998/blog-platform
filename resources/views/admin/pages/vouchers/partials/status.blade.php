@if ($item->is_active == App\Enums\VoucherStatus::ACTIVE)
    <span class="label label-success">{{__('Active')}}</span>
@else
    <span class="label label-default">{{__('Inactive')}}</span>
@endif