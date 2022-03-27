<?php

namespace App\Http\Controllers;


use App\Exports\PenggunaanBarangExport;
use App\Imports\PenggunaanBarangImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PenggunaanBarang;

class PenggunaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['PenggunaanBarang'] = PenggunaanBarang::all();
        return view('dashboard.PenggunaanBarang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.PenggunaanBarang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'waktu_beli' => 'required',
            'supplier' => 'required',
            'status' => 'required'
        ]);

        PenggunaanBarang::create($validatedData);

        return redirect(request()->segment(1) . '/PenggunaanBarang')->with('success', 'Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PenggunaanBarang $PenggunaanBarang)
    {
        return view('dashboard.PenggunaanBarang.edit', [
            'PenggunaanBarang' => $PenggunaanBarang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, PenggunaanBarang $PenggunaanBarang)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'waktu_beli' => 'required',
            'supplier' => 'required',

        ]);

        PenggunaanBarang::where('id', $PenggunaanBarang->id)
            ->update($validatedData);

        return redirect(request()->segment(1) . '/PenggunaanBarang')->with('success', 'Data telah diubah!');
    }
    public function StatusBarang(Request $request)
    {
        $data = PenggunaanBarang::where('id', $request->id)->first();
        $data->StatusBarang = $request->StatusBarang;
        $data->waktu_update_status = now();
        $update = $data->save();

        return response()->json([
            'waktu_update_status' => date('Y-m-d h:i:s', strtotime($data->waktu_update_status))
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validatedData = PenggunaanBarang::find($id);
        $validatedData->delete();
        return redirect(request()->segment(1) . '/PenggunaanBarang')->with('success', 'Data telah dihapus!');
    }

    public function exportPenggunaanBarang()
    {
        return Excel::download(new PenggunaanBarangExport, 'PenggunaanBarang.xlsx');
    }

    public function importPenggunaanBarang(Request $request)
    {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ($request) {
            Excel::import(new PenggunaanBarangImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        // return redirect(request()->segment(1).'/outlet')->route('outlet.index')->with('success', 'Data berhasil diimport!');
        return redirect()->route('PenggunaanBarang.index')->with('success', 'Data berhasil diimport!');
    }
}
