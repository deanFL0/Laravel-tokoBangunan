<?php

namespace App\Http\Controllers;
use App\Models\Karyawan as KaryawanModel;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = KaryawanModel::all();
        return view('karyawan', ['karyawan'=>$karyawan]);
    }

    public function create()
    {

        return view('tambahkaryawan');
    }

    public function store(Request $request)
    {
        KaryawanModel::updateOrCreate([
            'id' => $request->id
        ], [
            'nama' => $request->nama,
            'gender' => $request->gender,
            'sandi' => bcrypt($request->sandi)
        ]);

        return redirect()->route('karyawan')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $karyawan = KaryawanModel::find($id);
        return view('editkaryawan', ['karyawan'=>$karyawan]);
    }

    public function destroy($id)
    {
        try {
            KaryawanModel::destroy($id);
            return redirect()->route('karyawan')->with('status', 'Data berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('karyawan')->with('status', 'Data tidak bisa dihapus karena masih digunakan');
        }
    }

}


