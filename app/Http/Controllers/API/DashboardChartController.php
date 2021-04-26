<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardChartController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function getMonthlySalesBreakdown()
    {
        $months = [];
        $sales = [];

        for ($month = 1; $month <= 12; $month++) {

            $dateStart = Carbon::now()->year . '-' .str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . 01;
            $dateEnd = Carbon::now()->year . '-' .str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . 31;

            $sale = Order::where([
                ['date_placed', '>=', $dateStart],
                ['date_placed', '<=', $dateEnd]
            ])
            ->count();

            array_push($months, date("F", mktime(0, 0, 0, $month, 10)));
            array_push($sales, $sale);
        }

        return response()->json([
            'names' => json_encode($months),
            'values' => json_encode($sales)
        ]);
    }
}
