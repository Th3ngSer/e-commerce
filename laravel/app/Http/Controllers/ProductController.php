<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;    // <--- IMPORTANT: You must import your Model!


class ProductController extends Controller
{
    // GET /api/products
    public function getProducts(){
        // Screenshot shows: Product::all()
        $products = Product::all();
        return response()->json($products);
    }

    // POST /api/products
    public function createProduct(Request $request){
        // Screenshot shows: Product::create(['name' => 'Book'])
        // We use $request->all() to get data sent from the user (Postman/Frontend)
        $product = Product::create($request->all());

        return response()->json([
            "message" => "Product created successfully",
            "data" => $product
        ], 201);
    }

    // GET /api/products/{id}
    public function getProduct($productId){
        // Screenshot shows: Product::find(1) or Product::findOrFail(1)
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(["message" => "Product not found"], 404);
        }

        return response()->json($product);
    }

    // PUT /api/products/{id}
    public function updateProduct(Request $request, $productId){
        // Screenshot shows: Find -> Change properties -> Save
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(["message" => "Product not found"], 404);
        }

        // Update the product with the new data
        $product->update($request->all());

        return response()->json([
            "message" => "Product updated successfully",
            "data" => $product
        ]);
    }

    // DELETE /api/products/{id}
    public function deleteProduct($productId){
        // Screenshot shows: Product::find(1) -> delete()
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(["message" => "Product not found"], 404);
        }

        $product->delete();

        return response()->json(["message" => "Product deleted successfully"]);
    }
}
