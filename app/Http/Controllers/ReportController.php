<?php

namespace App\Http\Controllers;
use App\Exports\UserReport;
use App\Exports\ProductsReport;
use App\Exports\MonthlyReport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    // add service for each type of report
    public function store(Request $request)
    {
        if ($request->type === 'user') {

            $data = \App\Models\User::with(['orders' => function ($orders) {
                $orders->with('orderItems')
                    ->with('orderStatusCode')
                    ->with('invoice.payments.shipments.shipmentItems');
            }])
            ->where('id', 1)
            ->first();
    
            ob_end_clean();
            ob_start();
    
            return Excel::download(
                new UserReport($data),
                'invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX
            );

            // return ()->download();

            // get all user data, including purchases, spending total, this year, last 12 months
        } elseif ($request->type === 'monthly') {

            $monthStart = Carbon::parse($request->month)->startOfMonth()->format('Y-m-d');
            $monthEnd = Carbon::parse($request->month)->endOfMonth()->format('Y-m-d');

            $orders = Order::with('orderItems.invoice.payment.shipments.shipmentItems')
                ->where([
                    ['date_placed', '>=', $monthStart],
                    ['date_placed', '<=', $monthEnd]
                ])->get();
            
            ob_end_clean();
            ob_start();
        
            return Excel::download(
                new MonthlyReport($orders),
                'monthly-report.xlsx', \Maatwebsite\Excel\Excel::XLSX
            );

            // get best selling product
            // get orders created this month, total sales, parperback vs digital ration, this vs last month sales increase/decrease
        } elseif ($request->type === 'products') {
            // get number of sold products, most sold this month, most sold all time, etc
            // same as obove, but for all time
            $monthStart = Carbon::parse($request->month)->startOfMonth()->format('Y-m-d');
            $monthEnd = Carbon::parse($request->month)->endOfMonth()->format('Y-m-d');

            $orders = Order::with('orderItems.invoice.payment.shipments.shipmentItems')
                ->where([
                    ['date_placed', '>=', $monthStart],
                    ['date_placed', '<=', $monthEnd]
                ])->get();

            ob_end_clean();
            ob_start();
        
            return Excel::download(
                new ProductsReport($orders),
                'monthly-report.xlsx', \Maatwebsite\Excel\Excel::XLSX
            );

        }

        return $data;
    }
}
