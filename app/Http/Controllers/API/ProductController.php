<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductRelationshipsResource as ProductRelationshipsResource;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    /**
     * Return a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(
            Product::paginate(15)
        );
    }

    public function filter(Request $request)
    {
        if ($request->name == 'mostPopular') {
            $trending = Redis::zrevrange('trending_products.', 0, 2); //returns an Array
            $products = \App\Models\Product::hydrate(array_map('json_decode', $trending));
        } else if ($request->name == 'recommended') {
            $bestsellers = Redis::zrevrange('bestsellers.', 0, 2); //returns an Array
            $products = \App\Models\Product::hydrate(array_map('json_decode', $bestsellers));
        } else {
            $products = Product::where('name', 'like', '%' . $request->name . '%')->get();
        }

        return ProductResource::collection($products);
    }

    public function search(Request $request)
    {
        $query = (string)$request->searchBy;

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('author', 'like', '%' . $query . '%')
            ->orWhere('publisher', 'like', '%' . $query . '%')
            ->get();

        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return new ProductResource($product);
    }
}
