<?php

namespace App\Http\Controllers;

use App\Models\KebijakanPrivasi;
use Illuminate\Http\Request;

class KebijakanPrivasiController extends Controller
{
    private $param;
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    public function index()
    {
        try {
            $this->param['getDetailKP'] = KebijakanPrivasi::find(1);
            return view('backend.kebijakan_privasi.form', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, KebijakanPrivasi $kebijakanPrivasi)
    {
        $this->validate($request, [
                'desc' => 'required',
            ],
            [
                'required' => ':attribute harus diisi.',
            ],
            [
                'desc' => 'Deskripsi',
            ],
        );

        try {
            $kebijakanPrivasi = KebijakanPrivasi::find($kebijakanPrivasi->id);
            $kebijakanPrivasi->deskripsi = $request->desc;
            $kebijakanPrivasi->save();

            return redirect('/back-kebijakan-privasi')->withStatus('Berhasil memperbarui data.');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
