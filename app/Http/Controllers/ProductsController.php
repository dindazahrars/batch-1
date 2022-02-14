<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $data = Product::all();

        return response($data, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'category' => ['required'],
            'thumbnail_image' => ['required'],
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->category = $request->category;
        $product->thumbnail_image = $request->tuhumbnail_image ?? 'image.jpg';

        $product->save();

        return response($product, 200);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => ['required'],
            'category' => ['required'],
            'thumbnail_image' => ['required'],
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->category = $request->category;
        $product->thumbnail_image = $request->tuhumbnail_image ?? 'image.jpg';

        $product->save();

        return response($product, 200);
    }

    public function show($id) {
        $product = Product::findOrFail($id);

        return response($product, 200);
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        return response('Data Berhasil Dihapus!', 200);
    }
}