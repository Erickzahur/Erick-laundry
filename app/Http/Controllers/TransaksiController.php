<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Http\Requests\StoreTransaksiRequest;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('transaksi.index',[
        //     'paket' => Paket::all(),
        //     'member' => Member::all(),
        // ]);

        $data['detail_transaksi'] = DetailTransaksi::all();
        $data['transaksi'] = Transaksi::all();
        $data['member'] = Member::get();
        $data['paket'] = Paket::where('id_outlet', auth()->user()->id_outlet)->get();
        return view('dashboard.transaksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiRequest $request)
    {
        //
        //dd($request);
        $request['id_outlet'] = auth()->user()->id_outlet;
        $request['kode_invoice'] = $this->generateKodeInvoice();
        $request['tgl_bayar'] = ($request->bayar == 0 ? NULL : date('Y-m-d H:i:s'));
        $request['status'] = 'baru';
        $request['dibayar'] = ($request->bayar == 0 ? 'belum_dibayar' : 'dibayar');
        $request['id_user'] = auth()->user()->id;

        //input transaksi
        $input_transaksi = Transaksi::create($request->all());
        if ($input_transaksi == null) {
            return back()->withErrors([
                'transaksi' => 'Input Transaksi Gagal!',
            ]);
        }

        //input detail pembelian
        foreach ($request->id_paket as $i => $v) {
            $input_detail = DetailTransaksi::create([
                'id_transaksi' => $input_transaksi->id,
                'id_paket' => $request->id_paket[$i],
                'qty' => $request->qty[$i],
                'subtotal' => $request->subtotal[$i],
                'keterangan' => ''
            ]);
        }

        return redirect(request()->segment(1) . '/transaksi/faktur/' . $input_transaksi->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    private function generateKodeInvoice()
    {
        $last = Transaksi::orderBy('id', 'desc')->first();
        $last = ($last == null ? 1 : $last->id + 1);
        $kode = sprintf('TRS' . date('Ymd') . '%06d', $last);
        return $kode;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function faktur(Request $request, Transaksi $transaksi, $id)
    {
        $data = array(
            'transaksi' => Transaksi::find($id),
            'title' => 'Faktur'
        );
        $transaksi->load(['member', 'detail_transaksi', 'user']);
        return view('dashboard.transaksi.faktur')->with($data);
    }
}
