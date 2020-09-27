<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function store(Request $request)
    {
        if ($request->type === 'User Report') {

            $data = User::with('addresses')
                ->with(['orders', function ($orders) {
                    $orders->with('orderItems')
                        ->with('orderStatusCode')
                        ->with(['invoice', function ($invoice) {
                            $invoice->with('payments')
                                ->with('shipments.shipmentItems');
                        }]);
                }])
                ->where('id', $request->userId)
                ->first();

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
    }
}
