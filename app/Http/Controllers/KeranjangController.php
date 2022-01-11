<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    private $param;
    public function __construct()
    {
        $this->middleware(['role:customer']);
    }
    public function index()
    {
        $param['getCartMenu'] = \DB::table('keranjang')->select('menu.id', 'menu.judul', 'menu.deskripsi', 'keranjang.status', 'menu.harga')
                                ->join('menu', 'keranjang.menu_id', '=', 'menu.id')
                                ->where('status', '=', 'keranjang')
                                ->where('user_id', '=', \Auth::user()->id)
                                ->get();
        return view('frontend.keranjang', $param);
    }

    public function store(Menu $menu)
    {
        try {
            $keranjang = new Keranjang();
            $keranjang->menu_id = $menu->id;
            $keranjang->user_id = \Auth::user()->id;
            $keranjang->status = 'keranjang';
            $keranjang->save();

            return redirect('/pemesanan')->withStatus('Berhasil menambah data')->with('keranjangSuccess', 'Berhasil Menambahkan ke Keranjang');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function transaction(Request $request)
    {
        $getMenus = \DB::table('keranjang')->select('menu.id', 'menu.judul', 'menu.deskripsi', 'keranjang.status', 'menu.harga', 'keranjang.user_id', 'keranjang.menu_id')
                                ->join('menu', 'keranjang.menu_id', '=', 'menu.id')
                                ->where('status', '=', 'keranjang')
                                ->where('user_id', '=', \Auth::user()->id)
                                ->get();
        $getMenu = json_decode($getMenus,true);

        foreach ($getMenu as $items) {
            $transaksi = new Transaksi();
            $transaksi->user_id = $items['user_id'];
            $transaksi->menu_id = $items['menu_id'];
            $transaksi->alamat_pengiriman = $request->alamat_pengiriman;
            $transaksi->tanggal_pengiriman = $request->tanggal_pengiriman;
            $transaksi->waktu_pengiriman = $request->waktu_pengiriman;
            $transaksi->status_order = 'dalam proses';
            $transaksi->pembayaran = 'belum dibayar';
            $transaksi->save();
        }

        $updateKeranjang = Keranjang::where('status', 'keranjang')->where('user_id', \Auth::user()->id)->update([
            'status' => 'checkout',
        ]);
        /* dd($transacArray); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
