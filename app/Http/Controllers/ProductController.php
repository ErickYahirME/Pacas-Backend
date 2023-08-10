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

    public function downloadImage(Product $product) {
        try {

            // return response()->download(public_path(Storage::url($product->image)),
            // $product->image);
            // return $product;
            // exit();
            // return response()->download(Storage::path('public/imagesProduct/' . $product->image), $product->name . '.' . pathinfo($product->image, PATHINFO_EXTENSION));
            $imagePath = Storage::path('public/imagesProduct/' . $product->image);

            if (!Storage::exists('public/imagesProduct/' . $product->image)) {
                return response()->json(['message' => 'Image not found'], 404);
            }
            return response()->download($imagePath, $product->name . '.' . pathinfo($imagePath, PATHINFO_EXTENSION));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function getProductById($id){
        $product = product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        $product->image = asset(Storage::url($product->image));
        // return response()->json(product::find($id), 200);
        return response()->json($product, 200);
    }

    // public function hola(Request $r , $id){
    //     $product = Product::find($id);
    //     $product->update($r->only([
    //         'name',
    //         'price',
    //         'stock',
    //         'description',
    //         'author_id',
    //         'size_id',
    //         'type_clothes_id',
    //     ]));

    //     // Maneja el archivo de imagen si se envió uno nuevo
    //     if ($r->hasFile('image')) {
    //         $file = $r->file('image');
    //         $extension = $file->getClientOriginalExtension();
    //         $fileName = $r->input('name') . '.' . $extension;
    //         $path = $file->storeAs('public/imagesProduct', $fileName);
    //         $product->image = $fileName;
    //         $product->save();
    //     }

    //     return response()->json($product, 200);

    // }

    public function addProduct(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',

            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480|dimensions:min_width=100,min_height=200,max_width=1000,max_height=1000',
         // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:max:20480|dimensions:min_width=100,min_height=200,max_width=1000,max_height=1000',
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

    public function updateProduct(Request $request, $id)
{
    try {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $rules = [
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required',
            'stock' => 'sometimes|required',
            'description' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'author_id' => 'sometimes|required|exists:users,id',
            'size_id' => 'sometimes|required|exists:sizes,id',
            'type_clothes_id' => 'sometimes|required|exists:type_clothes,id',
        ];

        $request->validate($rules);

        // Actualiza los campos específicos proporcionados en la solicitud
        $product->update($request->only([
            'name',
            'price',
            'stock',
            'description',
            'author_id',
            'size_id',
            'type_clothes_id',
        ]));

        // Maneja el archivo de imagen si se envió uno nuevo
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $product->name . '.' . $extension; // Usamos el nombre actual del producto
            $path = $file->storeAs('public/imagesProduct', $fileName);
            $product->image = $path;
            $product->save();
        }

        return response()->json($product, 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
    }
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
        $products = product::where('author_id', $author)->get();
        if(is_null($products)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }

                 // Recorrer los productos y generar la URL completa de la imagen para cada uno
            foreach ($products as $product) {
                $product->image = asset(Storage::url($product->image));
            }
        return response()->json($products, 200);
    }


}



    // public function updateProduct(Request $request, $id)
    // {


    //     try {
    //         // return $request;
    //         // exit();
    //         $product = Product::find($id);

    //     if (is_null($product)) {
    //         return response()->json(['message' => 'Product Not Found'], 404);
    //     }

    //     // $request->validate([
    //     //     'name' => 'required|string|max:255',
    //     //     'price' => 'required',
    //     //     'stock' => 'required',
    //     //     'description' => 'required|string|max:255',
    //     //     'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
    //     //     'author_id' => 'required|exists:users,id',
    //     //     'size_id' => 'required|exists:sizes,id',
    //     //     'type_clothes_id' => 'required|exists:type_clothes,id',
    //     // ]);

    //     // Actualiza los campos específicos proporcionados en la solicitud
    //     $product->update($request->only([
    //         'name',
    //         'price',
    //         'stock',
    //         'description',
    //         'author_id',
    //         'size_id',
    //         'type_clothes_id',
    //     ]));

    //     // Maneja el archivo de imagen si se envió uno nuevo
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $extension = $file->getClientOriginalExtension();
    //         $fileName = $request->input('name') . '.' . $extension;
    //         $path = $file->storeAs('public/imagesProduct', $fileName);
    //         $product->image = $fileName;
    //         $product->save();
    //     }

    //     return response()->json($product, 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
    //     }

    // }


    // public function updateProduct(Request $request, $id) {
    //     // Imprime los datos del request para depurar
    //     var_dump($request->all());

    //     $product = product::find($id);

    //     if (is_null($product)) {
    //         return response()->json(['message' => 'Product Not Found'], 404);
    //     }

    //     $product->fill($request->all());
    //     $product->save();

    //     return response()->json($product, 200);
    // }

    // public function updateProduct(Request $request, $id) {
    //     $product = product::find($id);
    //     if (is_null($product)) {
    //         return response()->json(['message' => 'Product Not Found'], 404);
    //     }
    //     $product->fill($request->all());
    //     $product->save();
    //     return response()->json($product, 200);
    // }

    // public function updateProduct(Request $request, $id){
    //     $product = product::find($id);

    //     if(is_null($product)){
    //         return response()->json(['message' => 'Product Not Found'], 404);
    //     }
    //     $product->update($request->all());

    //     return response($product, 200);
    // }
