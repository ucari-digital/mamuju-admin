<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Berita;
class DashboardController extends Controller
{
    public function index()
    {
    	$berita = Berita::where('status', 'publish')->count();
    	return view('dashboard', compact('berita'));
    }

    public function index_writer()
    {
        $berita = Berita::where('status', 'publish')->count();
        return view('dashboard', compact('berita'));
    }
}