<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index()
    {
        return view('reports.index');
    }

    public function store(Request $request)
    {
        $exports = [
            'user' => 'exportUserReport',
            'monthly' => 'exportMonthlyReport',
            'products' => 'exportProductReport'
        ];

        return $request->type === 'monthly'
            ? $this->reportService->{$exports}($request)
            : $this->reportService->{$exports}();
    }
}
