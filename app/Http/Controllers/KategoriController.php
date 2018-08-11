<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use Illuminate\Http\Request;
use Auth;
class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::get_data();
    	return view('kategori.kategori', compact('data'));
    }

    public function save(Request $request)
    {
        $simpan = new Kategori;
        $simpan->nama_kategori = $request->nama_kategori;
        $simpan->label_color = $request->label_color;
        $simpan->created_by = null;
        $simpan->save();

        return redirect()
            ->back();
    }

    public function edit($id)
    {
        $detail = Kategori::where('id', $id)
            ->first();
        return view('kategori.edit', compact('detail', 'id'));
    }

    public function update(Request $request, $id)
    {
        Kategori::where('id', $id)
            ->update([
                'nama_kategori' => $request->nama_kategori,
                'label_color' => $request->label_color,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        return redirect()
            ->to(Auth::user()->role.'/kategori');
    }

    public function delete($id)
    {
        Kategori::where('id', $id)
            ->update([
                'is_deleted' => "Y",
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        return redirect()
            ->back();
    }
}
