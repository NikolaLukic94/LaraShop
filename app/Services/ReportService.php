<?php

namespace App\Services;

use App\Exports\MonthlyReport;
use App\Exports\ProductsReport;
use App\Exports\UserReport;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ReportService {

    public function exportUserReport()
    {
        $data = User::with(['orders' => function ($orders) {
            $orders->with('orderStatusCode')
                ->with('invoice.payments.shipments.shipmentItems')
                ->with(['orderItems' => function ($oi) {
                    $oi->with('product');
                }]);
        }])
            ->where('id', 1)
            ->first();

        return Excel::download(
            new UserReport($data->toArray()),
            'invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX
        );
    }

    public function exportMonthlyReport($request)
    {
        $monthStart = Carbon::parse($request->month)->startOfMonth()->format('Y-m-d');
        $monthEnd = Carbon::parse($request->month)->endOfMonth()->format('Y-m-d');

        $orders = Order::with('invoice.payments.shipments.shipmentItems')
            ->with(['orderItems' => function ($oi) {
                $oi->with('product.productType');
            }])
            ->where([
                ['date_placed', '>=', $monthStart],
                ['date_placed', '<=', $monthEnd]
            ])
            ->get();

        return Excel::download(
            new MonthlyReport($orders->toArray()),
            'monthly-report-' . Carbon::parse($request->month)->monthName . '.xlsx', \Maatwebsite\Excel\Excel::XLSX
        );
    }

    public function exportProductReport()
    {
        $products = Product::with('orderItems')->get();

        return Excel::download(
            new ProductsReport($products->toArray()),
            'products-report.xlsx', \Maatwebsite\Excel\Excel::XLSX
        );
    }
}
