<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\InvoiceStatus;
use App\Models\Product;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'desc')->get();

        $headingTitle = heading('Đơn hàng');
        $pageTitle = 'Đơn hàng';

        return view('admin.pages.invoice.index', compact(
            'headingTitle',
            'pageTitle',
            'invoices'
        ));
    }

    public function edit($id) {
        $invoice = Invoice::findOrFail($id);
        $products = InvoiceDetail::where('invoice_id', $invoice->id)->get();

        $invoiceStatus = InvoiceStatus::all();

        $headingTitle = heading('Đơn hàng: ' . $invoice->invoice_code);
        $pageTitle = 'Đơn hàng: '. $invoice->invoice_code;

        return view('admin.pages.invoice.edit', compact(
            'headingTitle',
            'pageTitle',
            'invoice',
            'products',
            'invoiceStatus'
        ));
    }

    public function save(Request $request) {
        $invoiceId = $request->invoice_id;
        $status = $request->status;

        if ($status === 'success') {
            // calculator stock
            $inventory = InvoiceDetail::where('invoice_id', $invoiceId)->get();
            foreach ($inventory as $row) {
                $product = Product::find($row->product_id);
                $remainingInventory = $product->quantity - $row->quantity;

                Product::where('id', $row->product_id)
                ->update(['quantity' =>$remainingInventory]);
            }
        }

        // Update invoice
        Invoice::where('id', $invoiceId)
        ->update(['status' => $status]);
    
        return response()->json([
            'status' => 200,
            'message' => 'Lưu thành công',
            'redirect' => route('admin.invoices.edit', $invoiceId)
        ]);
    }
}
