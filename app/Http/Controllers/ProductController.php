<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function getAllProduct(){

        // return response()->json(product::all(), 200);
        $products = product::all();

        // Recorrer los productos y generar la URL completa de la imagen para cada uno
        foreach ($products as $product) {
            $product->image = asset(Storage::url($product->image));
        }

        return response()->json($products, 200);
    }

    public function getProductById($id){
        $product = product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        return response()->json(product::find($id), 200);
    }

    public function addProduct(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=200,max_width=1000,max_height=1000',
            'author_id' => 'required|exists:users,id',
            'size_id' => 'required|exists:sizes,id',
            'type_clothes_id' => 'required|exists:type_clothes,id',
        ]);

        // $product = product::create($request->all());
        $product = new product($request->all());

        // $path = $request->file('image')->store('public/imagesProduct');
        $path = $request->file('image')->storeAs('public/imagesProduct', $request->name . '.' . $request->file('image')->extension());
        $product->image = $path;
        $product->save();

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
