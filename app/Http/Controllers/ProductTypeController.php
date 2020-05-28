<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Resources\ProductType as ProductTypeResource;

class ProductTypeController extends Controller
{
    /**
     * Return a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $products = ProductType::paginate(15);
        //return collection of articles as a resource
        return ProductTypeResource::collection($products);
    }
    public function index()
    {
        return view('productTypes.index');
    }

    public function store(Request $request) 
    {
        $newProductType = ProductType::create([
            'name' => $request->name
        ]);

        return response()->json([
            'createdInvoice' => $newProductType,
            'status' => 'success',
            'message' => 'New product type has been added'
        ]);
    }

    public function delete($id) 
    {
        $productType = ProductType::find($id);

        $productType->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Product type has been deleted'
        ]);
    }
}
