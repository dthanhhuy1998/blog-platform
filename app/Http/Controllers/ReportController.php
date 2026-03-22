<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Invoice;

class ReportController extends Controller
{
    public function reportRevenueByMonth() {
        $headingTitle = heading('BC DOANH THU THEO THÁNG');
        $pageTitle = 'BC DOANH THU THEO THÁNG';

        $reportData = [];
        $year = date('Y');

        $total = 0;
        for($i = 0; $i < 12; $i++) {
            $month = ($i+1 < 10) ? '0'. $i+1 : $i+1;

            $fromDate = $year . '-' . $month . '-' .'01';
            $toDate = $year . '-' . $month . '-' . date('t', strtotime($fromDate));

            $subTotal = Invoice::where('status', 'success')
                    ->whereBetween('created_at', [$fromDate, $toDate])
                    ->sum('price_total');

            $reportData[(string)$month] = $subTotal;
            $total += $subTotal;
        }

        $reportData['total'] = $total;

        return view('admin.pages.report.revenue_by_month', compact(
            'headingTitle',
            'pageTitle',
            'reportData'
        ));
    }
}
