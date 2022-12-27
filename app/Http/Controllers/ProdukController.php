<?php

namespace App\Http\Controllers;
use App\Models\Produk as ProdukModel;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::all();
        return view('produk', ['produk'=>$produk]);
    }

    public function create()
    {

        return view('tambahproduk');
    }

    public function store(Request $request)
    {
        ProdukModel::updateOrCreate([
            'id' => $request->id
        ], [
            'produk' => $request->produk,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);

        return redirect()->route('produk')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $produk = ProdukModel::find($id);
        return view('editproduk', ['produk'=>$produk]);
    }

    public function destroy($id)
    {
        try {
            ProdukModel::destroy($id);
            return redirect()->route('produk')->with('status', 'Data berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('produk')->with('status', 'Data tidak bisa dihapus karena masih digunakan');
        }
    }
}


