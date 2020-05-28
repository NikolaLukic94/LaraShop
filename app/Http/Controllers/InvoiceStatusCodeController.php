<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceStatusCode;
use App\Http\Resources\InvoiceStatusCodeResource as InvoiceResource;

class InvoiceStatusCodeController extends Controller
{
    public function getAll()
    {
    	$invoiceStatusCodes = InvoiceStatusCode::paginate(15);
        //return collection of articles as a resource
        return InvoiceResource::collection($invoiceStatusCodes);
    }

    public function index()
    {
    	return view('invoiceStatusCodes.index');
    }

    public function store(Request $request) 
    {
        $newInvoiceStatusCode = InvoiceStatusCode::create([
            'name' => $request->name
        ]);

        return response()->json([
            'createdInvoice' => $newInvoiceStatusCode,
            'status' => 'success',
            'message' => 'New invoice status code has been added'
        ]);
    }

    public function delete($id) 
    {
        $invoiceStatusCode = InvoiceStatusCode::find($id);

        $invoiceStatusCode->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Invoice status code has been deleted'
        ]);
    }
}
