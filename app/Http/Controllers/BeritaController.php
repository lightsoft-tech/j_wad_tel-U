<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    private $param;
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        $this->param['getBerita'] = Berita::get();
        return view('backend.berita.list', $this->param);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => 'required',
                'desc' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'title' => 'Judul',
                'desc' => 'Deskripsi',
            ],
        );

        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $berita = new Berita();
            $berita->judul = $request->title;
            $berita->deskripsi = $request->desc;

            if ($request->file('image')) {
                $request->file('image')->move('upload/berita', $date.$random.$request->file('image')->getClientOriginalName());
                $berita->gambar = $date.$random.$request->file('image')->getClientOriginalName();
            } else {
                $berita->gambar = 'berita.jpg';
            }

            $berita->save();
            return redirect('/back-berita')->withStatus('Berhasil menambah data');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit(Berita $berita)
    {
        try {
            $this->param['getDetailBerita'] = Berita::find($berita->id);
            return view('backend.berita.edit', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, Berita $berita)
    {
        $this->validate($request, [
                'title' => 'required',
                'desc' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'title' => 'Judul',
                'desc' => 'Deskripsi',
            ],
        );

        try {
            $date = date('H-i-s');
            $random = \Str::random(5);

            $berita = Berita::find($berita->id);
            $berita->judul = $request->title;
            $berita->deskripsi = $request->desc;

            if ($request->file('image')) {
                $request->file('image')->move('upload/berita', $date.$random.$request->file('image')->getClientOriginalName());
                $berita->gambar = $date.$random.$request->file('image')->getClientOriginalName();
            }

            $berita->save();
            return redirect('/back-berita')->withStatus('Berhasil memperbarui data');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy(Berita $berita)
    {
        try {
            Berita::find($berita->id)->delete();
            return redirect('/back-berita')->withStatus('Berhasil menghapus data');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
