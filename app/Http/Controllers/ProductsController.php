<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $data = product::all();

        return response($data, 200);
    }


    public function store(Request $request) {

        $products = new product();

        $products->name = $request->name;
        $products->email = $request->email;
        $products->category = $request->category;
        $products->status = $request->status;

        $products->save();

        return response($products, 200);
    }


    public function update(Request $request, $id) {

        $products = Product::find($id);

        $products->name = $request->name;
        $products->email = $request->email;
        $products->category = $request->category;
        $products->status = $request->status;

        $products->save();

        return response($products, 200);
    }

    public function show ($id) {

        $products = Product::findOrFail($id);

        return response($products, 200);
    }

    public function destroy($id) {

        $products = Product::findOrFail($id);

        $products>delete();

        return response('Data Berhasil Dihapus!', 200);

    }
}
