<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoice;
use App\Http\Requests\UpdateInvoice;
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

    public function store(StoreInvoice $request)
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

    public function update(UpdateInvoice $request, $id)
    {
        $invoice = Invoice::find($id);

        $invoice->order_id = $request->orderId;
        $invoice->invoice_status_code_id = $request->invoiceStatusCodeId;
        $invoice->date = $request->date;
        $invoice->invoice_details = $request->invoiceDetails;

        $invoice->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Invoice has been updated'
        ]);
    }

    public function delete(Invoice $invoice)
    {
        $invoice->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Invoice has been deleted'
        ]);
    }
}
