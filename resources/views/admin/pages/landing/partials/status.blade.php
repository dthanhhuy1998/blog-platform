@if ($item->status == App\Enums\PageStatus::ACTIVE)
    <span class="label label-success">{{__('Active')}}</span>
@else
    <span class="label label-default">{{__('Inactive')}}</span>
@endif