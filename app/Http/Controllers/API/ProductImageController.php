<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function store(Request $request)
    {
        $request->file->store('product', 'public');

        ProductImage::create([
            'image_path' => time() . '.' . $request->file->getClientOriginalExtension(),
            'product_id' => $request->productId
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'You have successfully upload file!'
        ]);
    }
}
