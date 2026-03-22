<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Enums\VoucherType;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::orderBy('created_at', 'desc')->get();

        $headingTitle = heading(__('Voucher List'));
        $pageTitle = __('Voucher List');

        return view('admin.pages.vouchers.index',
            compact('headingTitle', 'pageTitle', 'vouchers')
        );
    }

    public function list(Request $request)
    {
        $query = Voucher::query();

        $total = $query->count();

        $vouchers = $query
            ->withCount('orders')
            ->offset($request->start)
            ->limit($request->length)
            ->orderBy('updated_at', 'desc')
            ->get();
        
        $data = $vouchers->map(function ($item) {
            return [
                'code'          => e($item->code),
                'type'          => VoucherType::label($item->type),
                'value'         => ($item->type == VoucherType::PERCENT) ? number_format($item->value, 0) . '%' : number_format($item->value, 0, ',', '.'),
                'used_count'    => $item->orders_count,
                'start_at'      => !empty($item->start_at) ?  datetime_vi($item->start_at) : '',
                'end_at'        => !empty($item->end_at) ?  datetime_vi($item->end_at) : '',
                'status'        => view('admin.pages.vouchers.partials.status', compact('item'))->render(),
                'description'   => $item->description,
                'created_at'    => !empty($item->created_at) ?  datetime_vi($item->created_at) : '',
                'actions'       => view('admin.pages.vouchers.partials.actions', compact('item'))->render(),
            ];
        });

        return response()->json([
            'draw'            => intval($request->draw),
            'recordsTotal'    => $total,
            'recordsFiltered' => $total,
            'data'            => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:vouchers,code',
        ], [    
            'code.required' => __('required', ['attribute' => __('Voucher Code')]),
            'code.unique' => __('unique', ['attribute' => __('Voucher Code')]),
        ]);

        $data = $request->all();

        // Set default value
        $data['page_id'] = 1;

        Voucher::create($data);

        return response()->json([
            'success' => true,
            'message' => __(':module created successfully', ['module' => __('Voucher')])
        ]);
    }

    public function show(Voucher $voucher)
    {
        return response()->json([
            'status' => 'success',
            'result' => $voucher
        ]);
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'code' => 'required|unique:vouchers,code,' . $voucher->id,
        ], [    
            'code.required' => __('required', ['attribute' => __('Voucher Code')]),
            'code.unique' => __('unique', ['attribute' => __('Voucher Code')]),
        ]);

        $data = $request->all();
        $voucher->update($data);

        return response()->json([
            'success' => true,
            'message' => __(':module updated successfully', ['module' => __('Voucher')])
        ]);
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return response()->json([
            'success' => true,
            'message' => __(':module deleted successfully', ['module' => __('Voucher')])
        ]);
    }
}
