<?php

namespace App\Http\Controllers;

use App\Model\Berita;
use App\Model\Komentar;
use Illuminate\Http\Request;
use Storage;
use Auth;
class BeritaController extends Controller
{
	public function index()
	{
		return view('berita.berita');
	}

    public function index_writer()
    {
        return view('berita.berita');
    }

	public function save(Request $request)
    {
        try {
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
            $simpan->user_id = Auth::user()->id;
            $simpan->judul = $request->judul;
            $simpan->seo = $seo;
            $simpan->kode_kategori = $request->kode_kategori;
            $simpan->tags = $request->tags;
            $simpan->gambar = $destination_path.'/'.$file_name;
            $simpan->keterangan_gambar = $request->keterangan_gambar;
            $simpan->berita = $request->berita;
            $simpan->tgl_upload = $request->tgl_upload;
            $simpan->visit = 0;
            $simpan->save();

            alert()->success('Berhasil', 'Konten berita berhasil tersimpan');
            return redirect()
                ->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function save_writer(Request $request)
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
        $simpan->user_id = Auth::user()->id;
        $simpan->judul = $request->judul;
        $simpan->seo = $seo;
        $simpan->kode_kategori = $request->kode_kategori;
        $simpan->tags = $request->tags;
        $simpan->gambar = $destination_path.'/'.$file_name;
        $simpan->keterangan_gambar = $request->keterangan_gambar;
        $simpan->berita = $request->berita;
        $simpan->tgl_upload = $request->tgl_upload;
        $simpan->save();

        alert()->success('Berhasil', 'Konten berita berhasil tersimpan');
        return redirect()
            ->back();
    }

	public function draft()
	{
	    $data = Berita::get_data(["draft"]);
		return view('berita.draft', compact('data'));
	}

	public function draft_writer()
	{
	    $data = Berita::get_data(["draft"]);
		return view('berita.draft', compact('data'));
	}

    public function list()
    {
        $data = Berita::get_data(['publish']);
        return view('berita.list-berita', compact('data'));
    }

    public function list_writer()
    {
        $data = Berita::get_data(['publish']);
        return view('berita.list-berita', compact('data'));
    }

    public function detail($id)
    {
        $data = Berita::get_detail($id);
        return view('berita.detail', compact('data'));
    }

    public function detail_writer($id)
    {
        $data = Berita::get_detail($id);
        return view('berita.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Berita::get_detail($id);
        return view('berita.edit', compact('data', 'id'));
    }

    public function edit_writer($id)
    {
        $data = Berita::get_detail($id);
        return view('berita.edit', compact('data', 'id'));
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->hasFile('gambar'))
            {
                $destination_path = 'images/berita';

                $file_data = $request->input('image');
                $file_name = 'image_' . time() . '.png';
                @list($type, $file_data) = explode(';', $file_data);
                @list(, $file_data) = explode(',', $file_data);
                if ($file_data != "") {
                    Storage::disk('public')->put($destination_path . '/' . $file_name, base64_decode($file_data));
                }

                $image_name = $image_name =$destination_path.'/'.$file_name;

            }else{
                $image_name = Berita::select('gambar')->where('id', $id)->first()->gambar;
            }

            $seo = str_slug($request->judul, '-');

            Berita::where('id', $id)
                ->update([
                    'user_id' => Auth::user()->id,
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

            alert()->success('Berhasil', 'Konten berita berhasil di perbarui');
            return redirect()
                ->to(Auth::User()->role.'/berita/draft');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update_writer(Request $request, $id)
    {
        try {
            if ($request->hasFile('gambar'))
            {
                $destination_path = 'images/berita';

                $file_data = $request->input('image');
                $file_name = 'image_' . time() . '.png';
                @list($type, $file_data) = explode(';', $file_data);
                @list(, $file_data) = explode(',', $file_data);
                if ($file_data != "") {
                    Storage::disk('public')->put($destination_path . '/' . $file_name, base64_decode($file_data));
                }

                $image_name = $image_name =$destination_path.'/'.$file_name;

            }else{
                $image_name = Berita::select('gambar')->where('id', $id)->first()->gambar;
            }

            $seo = str_slug($request->judul, '-');

            Berita::where('id', $id)
                ->update([
                    'user_id' => Auth::user()->id,
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

            alert()->success('Berhasil', 'Konten berita berhasil di perbarui');
            return redirect()
                ->to(Auth::User()->role.'/berita/draft');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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
        alert()->success('Berhasil', 'Konten berita berhasil di '.$status);
        return redirect()->back();
    }

    public function delete_komentar($id)
    {
        Komentar::where('id', $id)
            ->delete();
        alert()->success('Berhasil', 'Komentar telah terhapus');
        return redirect()->back();
    }
}
