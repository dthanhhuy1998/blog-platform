<tr>
@if (count($images) > 0)
    @foreach($images as $item)
        <tr>
            <td>
                <div class="preview-image" style="margin-bottom: 0;">
                    <img src="{{ asset('storage/'. $item->image) }}" alt="Image" id="preview">
                </div>
            </td>
            <td>
                <input type="text" class="form-control" placeholder="{{__('Sort Order')}}" value="{{$item->sort_order}}">
            </td>
            <td>
                <button 
                    type="button"
                    class="btn btn-danger btn-delete"
                    data-url="{{route('admin.landing.product.image.delete', $item->id)}}"
                    title="{{__('Delete Image')}}"
                >
                    <i class="fa fa-minus-circle"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endif