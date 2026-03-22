<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getList() {
        $customers = Customer::orderBy('created_at', 'desc')->get();

        $headingTitle = heading('Danh sách khách hàng');
        $pageTitle = 'Danh sách khách hàng';

        return view('admin.pages.customer.list',
            compact('headingTitle', 'pageTitle', 'customers')
        );
    }
}
