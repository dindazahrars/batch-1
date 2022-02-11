<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $data = Products::all();

        return response($data, 200);
    }


    public function store(Request $request) {

        $products = new products();

        $products->name = $request->name;
        $products->email = $request->email;
        $products->category = $request->category;
        $products->status = $request->status;

        $products->save();

        return response($products, 200);
    }


    public function update(Request $request, $id) {

        $products = products::find($id);

        $products->name = $request->name;
        $products->email = $request->email;
        $products->category = $request->category;
        $products->status = $request->status;

        $products->save();

        return response($products, 200);
    }

    public function show ($id) {

        $products = Products::findOrFail($id);

        return response($products, 200);
    }

    public function destroy($id) {

        $products = Products::findOrFail($id);

        $products>delete();

        return response('Data Berhasil Dihapus!', 200);

    }
}
