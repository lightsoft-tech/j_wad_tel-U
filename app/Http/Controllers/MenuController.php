<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $param;
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    
    
    public function index()
    {
        $this->param['getMenu'] = Menu::get();
        return view('backend.barang.list', $this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => 'required',
                'price' => 'required',
                'desc' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'title' => 'Judul',
                'price' => 'Harga',
                'desc' => 'Deskripsi',
            ],
        );

        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $menu = new Menu();
            $menu->judul = $request->title;
            $menu->harga = $request->price;
            $menu->deskripsi = $request->desc;

            if ($request->file('image')) {
                $request->file('image')->move('upload/menu', $date.$random.$request->file('image')->getClientOriginalName());
                $menu->gambar = $date.$random.$request->file('image')->getClientOriginalName();
            } else {
                $menu->gambar = 'menu.jpg';
            }

            $menu->save();
            return redirect('/back-menu')->withStatus('Berhasil menambah data');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit(Menu $menu)
    {
        try {
            $this->param['getDetailMenu'] = Menu::find($menu->id);
            return view('backend.barang.edit', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
                'title' => 'required',
                'price' => 'required',
                'desc' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'title' => 'Judul',
                'price' => 'Harga',
                'desc' => 'Deskripsi',
            ],
        );

        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $menu = Menu::find($menu->id);
            $menu->judul = $request->title;
            $menu->harga = $request->price;
            $menu->deskripsi = $request->desc;

            if ($request->file('image')) {
                $request->file('image')->move('upload/menu', $date.$random.$request->file('image')->getClientOriginalName());
                $menu->gambar = $date.$random.$request->file('image')->getClientOriginalName();
            }

            $menu->save();
            return redirect('/back-menu')->withStatus('Berhasil menambah data');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            Menu::find($menu->id)->delete();
            return redirect('/back-menu')->withStatus('Berhasil menghapus data');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
