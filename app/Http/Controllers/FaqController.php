<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private $param;
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    
    
    public function index()
    {
        $this->param['getFaq'] = Faq::get();
        return view('backend.faq.list', $this->param);
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
            $faq = new Faq();
            $faq->judul = $request->title;
            $faq->deskripsi = $request->desc;
            $faq->save();

            return redirect('/back-faq')->withStatus('Berhasil menambah data.');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit(Faq $faq)
    {
        try {
            $this->param['getDetailFaq'] = Faq::find($faq->id);
            return view('backend.faq.edit', $this->param);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
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
            $faq = Faq::find($faq->id);
            $faq->judul = $request->title;
            $faq->deskripsi = $request->desc;
            $faq->save();

            return redirect('/back-faq')->withStatus('Berhasil menambah data.');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy(Faq $faq)
    {
        try {
            Faq::find($faq->id)->delete();
            return redirect('/back-faq')->withStatus('Berhasil menghapus data.');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
