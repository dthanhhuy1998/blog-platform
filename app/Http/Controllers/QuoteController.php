<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

// Models
use App\Models\Quote;

class QuoteController extends Controller
{
    public function getList() {
        $quotes = Quote::orderBy('created_at', 'desc')->get();

        $headingTitle = heading('Danh sách yêu cầu báo giá');
        $pageTitle = 'Danh sách yêu cầu báo giá';

        return view('admin.pages.quote.list',
            compact('headingTitle', 'pageTitle', 'quotes')
        );
    }

    public function getDelete($quoteId) {
        DB::table('quote')->where('id', '=', $quoteId)->delete();
        return redirect()->back()->with('success_msg', 'Hủy bỏ yêu cầu thành công');
    }

    public function changeStatus($quoteId) {
        $quote = Quote::findOrFail($quoteId);

        $quoteStatus = 1;
        if($quote->status == 1) {
            $quoteStatus = 0;
        }

        DB::table('quote')
        ->where('id', $quoteId)
        ->update(['status' => $quoteStatus]);

        return redirect()->back()->with('success_msg', 'Thay đổi trạng thái thành công');
    }
}
