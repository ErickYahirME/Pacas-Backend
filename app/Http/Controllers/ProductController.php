<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function getAllProduct(){
        return response()->json(product::all(), 200);
    }

    public function getProductById($id){
        $product = product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        return response()->json(product::find($id), 200);
    }

    public function addProduct(Request $request){
        $product = product::create($request->all());
        return response($product, 201);
    }

    public function updateProduct(Request $request, $id){
        $product = product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        $product->update($request->all());
        return response($product, 200);
    }

    public function deleteProduct($id){
        $product = product::find($id);
        if(is_null($product)){
            return response()->json(['message'=> 'Product Not Found'], 404);
        }
        $product->delete();
        return response()->json(['message'=>'Product Deleted',null], 204);
    }

    //get product by author
    public function getProductByAuthor($author){
        $product = product::where('author_id', $author)->get();
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        return response()->json($product, 200);
    }


}
