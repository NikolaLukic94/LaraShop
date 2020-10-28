<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceStatusCode;
use App\Http\Requests\UpdateInvoiceStatusCode;
use Illuminate\Http\Request;
use App\Models\InvoiceStatusCode;
use App\Http\Resources\InvoiceStatusCodeResource as InvoiceResource;

class InvoiceStatusCodeController extends Controller
{
    public function getAll()
    {
        return InvoiceResource::collection(
            InvoiceStatusCode::paginate(15)
        );
    }

    public function index()
    {
        return view('invoiceStatusCodes.index');
    }

    public function store(StoreInvoiceStatusCode $request)
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

    public function update(UpdateInvoiceStatusCode $request, $id)
    {
        $invoiceStatusCode = InvoiceStatusCode::find($id);

        $invoiceStatusCode->name = $request->name;

        $invoiceStatusCode->save();

        return response()->json([
            'updatedInvoice' => $invoiceStatusCode,
            'status' => 'success',
            'message' => 'New invoice status code has been added'
        ]);
    }

    public function delete(InvoiceStatusCode $invoiceStatusCode)
    {
        $invoiceStatusCode->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Invoice status code has been deleted'
        ]);
    }
}
