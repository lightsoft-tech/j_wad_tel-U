<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    private $param;
    public function store(Request $request)
    {
        
        $updatePembayaran = Transaksi::where('pembayaran', 'belum dibayar')->where('user_id', \Auth::user()->id)->update([
            'pembayaran' => $request->pembayaran,
        ]);

        return redirect('/keuangan')->with('paySuccess', 'Berhasil Melakukan Pembayaran');
    }

    public function riwayat()
    {
        $param['getRiwayat'] = $getMenus = \DB::table('transaksi')->select('menu.judul', 'menu.deskripsi', 'menu.harga', 'transaksi.id', 'transaksi.alamat_pengiriman', 'transaksi.tanggal_pengiriman', 'transaksi.waktu_pengiriman', 'transaksi.status_order', 'transaksi.pembayaran')
        ->join('menu', 'transaksi.menu_id', '=', 'menu.id')
        ->where('pembayaran', '!=', 'belum dibayar')
        ->where('user_id', '=', \Auth::user()->id)
        ->get(); 
        return view('frontend.keuangan', $param);
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
}
