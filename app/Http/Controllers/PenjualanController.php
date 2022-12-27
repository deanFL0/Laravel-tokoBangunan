<?php

namespace App\Http\Controllers;
use App\Models\Penjualan as PenjualanModel;
use App\Models\Karyawan as KaryawanModel;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = PenjualanModel::all();
        return view('penjualan', ['penjualan'=>$penjualan]);
    }

    public function create()
    {
        $karyawan = KaryawanModel::select('id', 'nama')->get();
        return view('tambahpenjualan', ['karyawan'=>$karyawan]);
    }

    public function store(Request $request)
    {
        PenjualanModel::updateOrCreate([
            'id' => $request->id
        ], [
            'tgl' => $request->tgl,
            'karyawan_id' => $request->karyawan_id
        ]);

        return redirect()->route('penjualan')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $penjualan = PenjualanModel::find($id);
        $karyawan = KaryawanModel::select('id', 'nama')->get();
        return view('editpenjualan', ['penjualan'=>$penjualan], ['karyawan'=>$karyawan]);
    }

    public function destroy($id)
    {
        try {
            PenjualanModel::destroy($id);
            return redirect()->route('penjualan')->with('status', 'Data berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('penjualan')->with('status', 'Data tidak bisa dihapus karena masih digunakan');
        }
    }
}


