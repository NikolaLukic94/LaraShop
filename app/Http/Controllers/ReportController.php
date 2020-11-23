<?php

namespace App\Http\Controllers;
use App\Exports\UserReport;
use App\Exports\ProductsReport;
use App\Exports\MonthlyReport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    // todo: move to a dedicated class
    public function store(Request $request)
    {
        return $this->export($request);
    }

    public function export($request)
    {
        if ($request->type === 'user') {

            $data = \App\Models\User::with(['orders' => function ($orders) {
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

        } elseif ($request->type === 'monthly') {

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

        } elseif ($request->type === 'products') {

            $products = Product::with('orderItems')->get();

            return Excel::download(
                new ProductsReport($products->toArray()),
                'products-report.xlsx', \Maatwebsite\Excel\Excel::XLSX
            );
        }
    }
}
