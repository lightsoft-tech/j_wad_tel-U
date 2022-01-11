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
        $param['getRiwayat'] = \DB::table('transaksi')->select('menu.judul', 'menu.deskripsi', 'menu.harga', 'transaksi.id', 'transaksi.alamat_pengiriman', 'transaksi.tanggal_pengiriman', 'transaksi.waktu_pengiriman', 'transaksi.status_order', 'transaksi.pembayaran')
        ->join('menu', 'transaksi.menu_id', '=', 'menu.id')
        ->where('pembayaran', '!=', 'belum dibayar')
        ->where('user_id', '=', \Auth::user()->id)
        ->get(); 
        return view('frontend.keuangan', $param);
    }

    public function list()
    {
        $param['getList'] = \DB::table('transaksi')->select('menu.judul', 'menu.deskripsi', 'menu.harga', 'transaksi.id', 'transaksi.alamat_pengiriman', 'transaksi.tanggal_pengiriman', 'transaksi.waktu_pengiriman', 'transaksi.status_order', 'transaksi.pembayaran')
        ->join('menu', 'transaksi.menu_id', '=', 'menu.id')
        ->where('pembayaran', '!=', 'belum dibayar')
        ->get(); 
        return view('backend.transaksi.list', $param);
    }

    public function proses(Transaksi $transaksi)
    {
        $transaksiU = Transaksi::find($transaksi->id);
        $transaksiU->status_order = 'dalam proses';
        $transaksiU->save();

        return redirect('/back-transaksi')->withStatus('Berhasil memperbarui data.');
    }

    public function perjalanan(Transaksi $transaksi)
    {
        $transaksiU = Transaksi::find($transaksi->id);
        $transaksiU->status_order = 'dalam perjalanan';
        $transaksiU->save();

        return redirect('/back-transaksi')->withStatus('Berhasil memperbarui data.');
    }

    public function done(Transaksi $transaksi)
    {
        $transaksiU = Transaksi::find($transaksi->id);
        $transaksiU->status_order = 'diterima';
        $transaksiU->save();

        return redirect('/back-transaksi')->withStatus('Berhasil memperbarui data.');
    }
}
