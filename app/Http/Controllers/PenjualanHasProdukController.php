<?php

namespace App\Http\Controllers;

use App\Models\PenjualanHasProduk as PenjualanHasProdukModel;
use App\Models\Produk as ProdukModel;
use App\Models\Penjualan as PenjualanModel;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class PenjualanHasProdukController extends Controller
{
    public function index()
    {
        $penjualanHasProduk = PenjualanHasProdukModel::all();
        return view('penjualanHasProduk', ['penjualanHasProduk' => $penjualanHasProduk]);
    }

    public function create()
    {
        $produk = ProdukModel::all();
        $penjualan = PenjualanModel::all();
        $array = array('produk' => $produk, 'penjualan' => $penjualan);
        return view('tambahpenjualanHasProduk', $array);
    }

    public function store(Request $request)
    {

        $penjualanHasProduk = PenjualanHasProdukModel::where('penjualan_id', $request->penjualan_id)->where('produk_id', $request->produk_id)->first();
        if ($penjualanHasProduk) {
            //restore stok
            $produk = ProdukModel::findOrFail($penjualanHasProduk->produk_id);
            $produk->stok = $produk->stok + $penjualanHasProduk->qty;
            $produk->save();

        }
        PenjualanHasProdukModel::updateOrCreate([
            'id' => $request->id
        ], [
            'penjualan_id' => $request->penjualan_id,
            'produk_id' => $request->produk_id,
            'qty' => $request->qty,
            'harga' => $request->harga
        ]);


        $produk = ProdukModel::findOrFail($request->produk_id);
        $produk->stok = $produk->stok - $request->qty;
        $produk->save();

        return redirect()->route('penjualanHasProduk')->with('status', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $penjualanHasProduk = PenjualanHasProdukModel::findorfail($id);
        $produk = ProdukModel::all();
        $penjualan = PenjualanModel::all();
        $array = array('produk' => $produk, 'penjualan' => $penjualan);
        return view('editpenjualanHasProduk', ['penjualanHasProduk' => $penjualanHasProduk], $array);
    }

    public function destroy($id)
    {
        $penjualanHasProduk = PenjualanHasProdukModel::findorfail($id);
        $this->restoreStok($id);
        PenjualanHasProdukModel::destroy($id);

        return redirect()->route('penjualanHasProduk')->with('status', 'Data Berhasil Dihapus');
    }

    private function restoreStok($id)
    {
        $penjualanHasProduk = PenjualanHasProdukModel::findorfail($id);
        $produk = ProdukModel::find($penjualanHasProduk->produk_id);
        $produk->stok = $produk->stok + $penjualanHasProduk->qty;
        $produk->save();
    }
}
