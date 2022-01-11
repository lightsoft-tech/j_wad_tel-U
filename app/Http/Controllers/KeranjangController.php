<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Menu;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    private $param;
    public function __construct()
    {
        $this->middleware(['role:customer']);
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
