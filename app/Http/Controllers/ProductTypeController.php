<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductType;
use App\Http\Requests\UpdateProductType;
use App\Models\ProductType;
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

    public function store(StoreProductType $request) 
    {
        $newProductType = ProductType::create([
            'name' => $request->name,
            'description' => $request->name // todo: finish
        ]);

        return response()->json([
            'createdProductType' => $newProductType,
            'status' => 'success',
            'message' => 'New product type has been added'
        ]);
    }

    public function update(UpdateProductType $request, $id) 
    {
        $productType = ProductType::find($id);

        $productType->name = $request->name;

        $productType->save();

        return response()->json([
            'productType' => $productType,
            'status' => 'success',
            'message' => 'Product type has been updated!'
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
