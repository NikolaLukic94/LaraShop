<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Storage;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductRelationshipsResource as ProductRelationshipsResource;

class ProductController extends Controller
{
    /**
     * Return a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $products = Product::paginate(15);
        //return collection of articles as a resource
        return ProductResource::collection($products);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('products.home');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.index-browse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_type_id' => $request->product_type_id
        ]);

        $images = $request->images;

        foreach($images as $image) {
            $imagePath = Storage::disk('uploads')->put(
                $product->name . '/products' . $product->id, $image
            );

            ProductImage::create([
                'product_id' => $product,
                'image_path' => $imagePath
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function browse()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, Product $product)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->product_type_id = $request->product_type_id;

        $product->save();  

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        $product = Submission::find($id);

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ]);
    }

    public function search() 
    {
        // get recommended books - the ones sold the most
        // $books = Product::popular();
         // maybe to add rating to books
        // for now, just take some to display them right away

        return view('products.search');
    }

    public function filter(Request $request) 
    {
        $products =  Product::where('name', 'like', '%'. $request->name.'%')
            ->orWhere('name', 'like', '%'. $request->name.'%')
            ->get();

        return ProductResource::collection($products);
    }
}
