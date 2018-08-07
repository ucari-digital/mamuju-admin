<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";

    public static function get_data($status)
    {
        return self::select('berita.*', 'nama_kategori')
            ->join('kategori', 'kategori.id', '=', 'berita.kode_kategori')
            ->orderBy('berita.updated_at', 'desc')
            ->whereIn('status', $status)
            ->get();
    }

    public static function get_detail($id)
    {
        return self::select('berita.*', 'nama_kategori', 'kategori.id as id_kategori')
            ->join('kategori', 'kategori.id', '=', 'berita.kode_kategori')
            ->orderBy('berita.updated_at', 'desc')
            ->where('berita.id', $id)
            ->first();
    }
}
