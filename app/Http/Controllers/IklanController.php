<?php

namespace App\Http\Controllers;

use App\Model\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Auth;

class IklanController extends Controller
{
    public function index()
    {
        $data = Iklan::orderBy('created_at', 'DESC')->get();
        return view('iklan.index', compact('data'));
    }

    public function save(Request $request)
    {
        try {
            $image = $request->gambar;
            $destination_path = 'images/iklan';

            $image_name = rand('100', '999').'.'.$image->getClientOriginalExtension();
            $image->move($destination_path, $image_name);

            $simpan = new Iklan;
            $simpan->user_id = $this->get_auth_id();
            $simpan->gambar = $image_name;
            $simpan->url = $request->url;
            $simpan->type = $request->type;
            $simpan->save();

            alert()->success('Berhasil','Iklan berhasil tersimpan');
            return redirect()
                ->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        $detail = Iklan::where('id', $id)
            ->first();
        return view('iklan.edit', compact('detail', 'id'));
    }

    public function update(Request $request, $id)
    {
        $gambar = Iklan::select('gambar')->where('id', $id)->first()->gambar;
        $arr_gambar = explode('.', $gambar);

        if ($request->hasFile('gambar'))
        {
            $image = $request->gambar;
            $destination_path = 'images/iklan';
            $file_directory = $destination_path.'/'.$gambar;

            if(file_exists(public_path($file_directory)))
            {
                unlink(public_path($file_directory));
            }

            $image_name = $arr_gambar[0].'.'.$image->getClientOriginalExtension();
            $image->move($destination_path, $image_name);
            $gambar = $image_name;
        }

        Iklan::where('id', $id)
            ->update([
                'user_id' => $this->get_auth_id(),
                'gambar' => $gambar,
                'url' => $request->url,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        alert()->success('Berhasil','Iklan berhasil diperbarui');
        return redirect()
            ->to(Auth::user()->role.'/iklan');
    }

    public function delete($id)
    {
        $gambar = Iklan::select('gambar')->where('id', $id)->first()->gambar;
        $file_directory = 'images/iklan/'.$gambar;

        if(file_exists(public_path($file_directory)))
        {
            unlink(public_path($file_directory));
        }

        Iklan::where('id', $id)
            ->delete();

        alert()->success('Berhasil','Iklan berhasil terhapus');
        return redirect()
            ->back();
    }
}
