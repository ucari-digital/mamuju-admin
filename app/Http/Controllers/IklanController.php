<?php

namespace App\Http\Controllers;

use App\Model\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $destination_path = 'images/iklan';

            $file_data = $request->input('gambar');
            $file_name = 'image_'.time().'.png';
            @list($type, $file_data) = explode(';', $file_data);
            @list(, $file_data)      = explode(',', $file_data);
            if($file_data!=""){
                Storage::disk('public')->put($destination_path.'/'.$file_name, base64_decode($file_data));
            }

            $simpan = new Iklan;
            $simpan->user_id = $this->get_auth_id();
            $simpan->gambar = $destination_path.'/'.$file_name;
            $simpan->url = $request->url;
            $simpan->save();

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
        if ($request->hasFile('gambar'))
        {
            $destination_path = 'images/iklan';

            $file_data = $request->input('gambar');
            $file_name = 'image_'.time().'.png';
            @list($type, $file_data) = explode(';', $file_data);
            @list(, $file_data)      = explode(',', $file_data);
            if($file_data!=""){
                Storage::disk('public')->put($destination_path.'/'.$file_name, base64_decode($file_data));
            }

            $gambar = $destination_path.'/'.$file_name;
        }else{
            $gambar = Iklan::select('gambar')->where('id', $id)->first()->gambar;
        }

        Iklan::where('id', $id)
            ->update([
                'user_id' => $this->get_auth_id(),
                'gambar' => $gambar,
                'url' => $request->url,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        return redirect()
            ->to(Auth::user()->role.'/iklan');
    }

    public function delete($id)
    {
        Iklan::where('id', $id)
            ->delete();

        return redirect()
            ->back();
    }
}
