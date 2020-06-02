<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use App\Http\Resources\Invoice as InvoiceResource;

class InvoiceController extends Controller
{
    public function getAll()
    {
    	$invoices = Invoice::paginate(15);

        return InvoiceResource::collection($invoices);
    }

    public function index()
    {
    	return view('invoices.index');
    }

    public function store(Request $request)
    {
        Invoice::create([
            'order_id' => $request->orderId,
            'invoice_status_code_id' => $request->invoiceStatusCodeId,
            'date' => $request->date,
            'invoice_details' => $request->invoiceDetails
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'New invoice has been created'
        ]);
    }

    public function delete($id) 
    {
        $invoice = Invoice::find($id);

        $invoice->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Invoice has been deleted'
        ]);
    }
}
