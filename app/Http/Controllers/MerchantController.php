<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function index() {
        $data = Merchant::all();

        return response($data, 200);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => ['required'],
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        $merchant = new Merchant();

        $merchant->name = $request->name;
        $merchant->email = $request->email;
        $merchant->password = Hash::make($request->password);
        $merchant->photo_profile = $request->photo_profile ?? 'user.jpg';
        $merchant->status = $request->status;

        $merchant->save();

        return response($merchant, 200);
    }

    public function update(Request $request, $id) {

        $merchant = Merchant::find($id);

        $merchant->name = $request->name;
        $merchant->email = $request->email;
        $merchant->password = Hash::make($request->password);
        $merchant->photo_profile = $request->photo_profile ?? 'user.jpg';
        $merchant->status = $request->status;

        $merchant->save();

        return response($merchant, 200);
    }

    public function show ($id) {

        $merchant = Merchant::findOrFail($id);

        return response($merchant, 200);
    }

    public function destroy($id) {

        $merchant = Merchant::findOrFail($id);

        $merchant->delete();

        return response('Data Berhasil Dihapus!', 200);

    }
}
