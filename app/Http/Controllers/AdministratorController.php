<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index()
    {
    	return view('administrator.administrator');
    }

    public function list()
    {
    	return view('administrator.list-administrator');
    }
}
