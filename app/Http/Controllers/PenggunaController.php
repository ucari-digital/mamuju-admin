<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
class PenggunaController extends Controller
{
    public function index()
    {
    	$data = User::where('role', 'user')->get();
    	return view('pengguna.pengguna', compact('data'));
    }

    public function status($mode, $id)
    {
    	try {
    		User::where('id', $id)
    		->update([
    			'status' => $mode
    		]);
            alert()->success('Berhasil', 'Pengguna telah '.$mode);
    		return redirect()
                ->back();
    	} catch (\Exception $e) {
            alert()->error('opps', $e);
    		return redirect()
                ->back();
    	}
    }
}
