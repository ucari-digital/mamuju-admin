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
    		return redirect('pengguna')
	    	->with('status', 'success')
	    	->with('message', 'Status berhasil diubah');
    	} catch (\Exception $e) {
    		return redirect('pengguna')
	    	->with('status', 'failed')
	    	->with('message', 'Error : '.$e->getMessage());
    	}
    }
}
