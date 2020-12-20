<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvoiceStatusCode;
use App\Http\Resources\InvoiceStatusCodeResource as InvoiceResource;

class InvoiceStatusCodeController extends Controller
{
    public function __invoke()
    {
        return InvoiceResource::collection(
            InvoiceStatusCode::paginate(15)
        );
    }
}
