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
}
