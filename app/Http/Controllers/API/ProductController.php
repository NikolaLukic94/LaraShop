<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreProduct;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Models\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    /**
     * Return a resource.
     *
     * @param ProductFilter $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProductFilter $filters)
    {
        $products = Product::filter($filters);

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully fetched!',
            'data' => ProductResource::collection(
                $products->paginate(15)
            )
        ]);
    }

//    public function filter(Request $request)
//    {
//        if ($request->name == 'mostPopular') {
//            $trending = Redis::zrevrange('trending_products.', 0, 2); //returns an Array
//            $products = Product::hydrate(array_map('json_decode', $trending));
//        } else if ($request->name == 'recommended') {
//            $bestsellers = Redis::zrevrange('bestsellers.', 0, 2); //returns an Array
//            $products = Product::hydrate(array_map('json_decode', $bestsellers));
//        } else {
//            $products = Product::where('name', 'like', '%' . $request->name . '%')->get();
//        }
//
//        $number = 0;
//
//        if (count($products) < 5) {
//            $number = count($products) - 5;
//        } elseif ((count($products) % 5) !== 0) {
//            $number = 5 - count($products) % 5;
//        }
//
//        if ($number !== 0) {
//            $remainingProducts = Product::get()->take($number);
//            $products = $products->merge($remainingProducts);
//        }
//
//        return ProductResource::collection($products);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProduct $request)
    {
        $product = Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'product_type_id' => $request['productTypeId']
        ]);

        return response()->json([
            'createdProduct' => $product,
            'status' => 'success',
            'message' => 'Product created successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        $product->product_type_id = $request['productTypeId'];

        $product->save();

        return response()->json([
            'updatedProduct' => $product,
            'status' => 'success',
            'message' => 'Product updated successfully'
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        Redis::zincrby('trending_products', 1, $product);

        return new ProductResource($product);
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product successfully deleted!',
        ], 200);
    }
}
