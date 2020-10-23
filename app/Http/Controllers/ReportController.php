<?php

namespace App\Http\Controllers;
use App\Exports\UserReport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function store(Request $request)
    {
        $data = User::with(['orders' => function ($orders) {
            $orders->with('orderItems')
                ->with('orderStatusCode')
                ->with('invoice.payments.shipments.shipmentItems');
        }])
        ->where('id', 1)
        ->first();

        ob_end_clean();
        ob_start();

        return Excel::download(new UserReport($data), 'invoices.csv', \Maatwebsite\Excel\Excel::CSV);

        // return Excel::download(
        //     new UserReport($data),
        //     'invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX
        // );

        if ($request->type === 'User Report') {

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
        } elseif ($request->type === 'Monthly Report') {

            $monthStart = Carbon::parse($request->month)->startOfMonth()->format('Y-m-d');
            $monthEnd = Carbon::parse($request->month)->endOfMonth()->format('Y-m-d');

            $orders = Order::with('orderItems.invoice.payment.shipments.shipmentItems')
                ->where([
                    ['date', '>=', $monthStart],
                    ['date', '<=', $monthEnd]
                ])->get();
            
            // get best selling product
            // get orders created this month, total sales, parperback vs digital ration, this vs last month sales increase/decrease
        } elseif ($request->type === 'Products Report') {
            // get number of sold products, most sold this month, most sold all time, etc
        }

        return $data;
    }
}
