<?php

namespace App\Http\Controllers;

use App\Model\Berita;
use Illuminate\Http\Request;
use Storage;
class BeritaController extends Controller
{
	public function index()
	{
		return view('berita.berita');
	}

	public function save(Request $request)
    {
        // return $request;
        $destination_path = 'images/berita';

        $file_data = $request->input('image');
        $file_name = 'image_'.time().'.png';
        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data)      = explode(',', $file_data);
        if($file_data!=""){
            Storage::disk('public')->put($destination_path.'/'.$file_name, base64_decode($file_data));
        }

        $seo = str_slug($request->judul, '-');

        $simpan = new Berita;
        $simpan->user_id = $this->get_auth_id();
        $simpan->judul = $request->judul;
        $simpan->seo = $seo;
        $simpan->kode_kategori = $request->kode_kategori;
        $simpan->tags = $request->tags;
        $simpan->gambar = $destination_path.'/'.$file_name;
        $simpan->keterangan_gambar = $request->keterangan_gambar;
        $simpan->berita = $request->berita;
        $simpan->tgl_upload = $request->tgl_upload;
        $simpan->save();

        return redirect()
            ->back();
    }

	public function draft()
	{
	    $data = Berita::get_data(["draft"]);
		return view('berita.draft', compact('data'));
	}

    public function list()
    {
        $data = Berita::get_data(['publish']);
        return view('berita.list-berita', compact('data'));
    }

    public function detail($id)
    {
        $data = Berita::get_detail($id);
        return view('berita.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Berita::get_detail($id);
        return view('berita.edit', compact('data', 'id'));
    }

    public function update(Request $request, $id)
    {
        $seo = str_slug($request->judul, '-');

        $image = $request->gambar;
        $destination_path = 'images/berita';

        if ($request->hasFile('gambar'))
        {
            $image_name = $seo.'.'.$image->getClientOriginalExtension();
            $image->move($destination_path, $image_name);
        }else{
            $image_name = Berita::select('gambar')->where('id', $id)->first()->gambar;
        }

        Berita::where('id', $id)
            ->update([
                'user_id' => $this->get_auth_id(),
                'judul' => $request->judul,
                'seo' => $seo,
                'kode_kategori' => $request->kode_kategori,
                'tags' => $request->tags,
                'gambar' => $image_name,
                'keterangan_gambar' => $request->keterangan_gambar,
                'berita' => $request->berita,
                'tgl_upload' => $request->tgl_upload,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        return redirect()
            ->to('berita/draft');
    }

    public function status($id, $status)
    {
        if($status == "publish")
        {
            $approved_by = $this->get_auth_id();
        }else{
            $approved_by = null;
        }

        Berita::where('id', $id)
            ->update([
                'status' => $status,
                'approved_by' => $approved_by,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        return redirect()->back();
    }
}
