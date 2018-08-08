<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;

use App\User;
class AdministratorController extends Controller
{
    public function index()
    {
    	return view('administrator.administrator');
    }

    public function list()
    {
    	$data = User::whereIn('role', ['writer', 'administrator'])->get();
    	return view('administrator.list-administrator', compact('data'));
    }

    public function edit($id)
    {
    	$data = User::where('id', $id)->first();
    	return view('administrator.edit-administrator', compact('data'));
    }

    public function save()
    {
    	try {
	    	$avatar = Storage::disk('public')->put('images/avatar', $request->file('avatar'));
	    	
	    	$field = new User;
	    	$field->name = $request->name;
	    	$field->email = $request->email;
	    	$field->password = Hash::make($request->password);
	    	$field->position = $request->position;
	    	$field->role = $request->role;
	    	$field->avatar = $avatar;
	    	$field->save();
	    	return redirect('administrator')
	    	->with('status', 'success')
	    	->with('message', 'Berhasil mendaftarkan anggota');
    	} catch (\Exception $e) {
    		return redirect('administrator')
	    	->with('status', 'failed')
	    	->with('message', 'Error : '.$e->getMessage());
    	}
    }

    public function update(Request $r, $id)
    {
    	try {
    		$query = User::where('id', $id);
    		if (empty($r->avatar)) {
    			$query->update([
	    			'name' => $r->name,
	    			'email' => $r->email,
	    			'position' => $r->position,
	    			'role' => $r->role
	    		]);
    		} else {
    			$avatar = Storage::disk('public')->put('images/avatar', $r->file('avatar'));
    			$query->update([
	    			'name' => $r->name,
	    			'email' => $r->email,
	    			'position' => $r->position,
	    			'role' => $r->role,
	    			'avatar' => $avatar
	    		]);
    		}
    		return redirect('administrator/edit/'.$id)
	    	->with('status', 'success')
	    	->with('message', 'Berhasil mengubah informasi anggota');
    	} catch (\Exception $e) {
    		return redirect('administrator/edit/'.$id)
	    	->with('status', 'failed')
	    	->with('message', 'Error : '.$e->getMessage());
    	}
    }

    public function action(Request $request, $mode, $id)
    {	
    	/**
    	 * Suspend
    	 */
		if ($mode == 'suspend') {
			self::status($id, $mode);
		}   	
    }


    public static function status($id, $status)
    {
    	try {
    		User::where('id', $id)
    		->update([
    			'status' => $status
    		]);
    		return 'success';
    	} catch (\Exception $e) {
    		return 'failed';
    	}
    }
}
