<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductType;
use App\Http\Requests\UpdateProductType;
use App\Models\ProductType;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductTypeController extends Controller
{
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
        $products = Product::where('product_type_id', $id)->get();

        if (count($products) > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to delete Product type in use'
            ]);
        } else {
            $productType = ProductType::find($id);

            $productType->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Product type has been deleted'
            ]);
        }
    }
}
