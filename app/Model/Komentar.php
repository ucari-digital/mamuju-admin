<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    public static function get_komentar($berita_id)
    {
        return self::select('komentar.*', 'name', 'email')->join('users', 'users.id', '=', 'komentar.user_id')->where('berita_id', $berita_id)->orderBy('komentar.id', 'DESC')->get();
    }

    public static function count_komentar($berita_id)
    {
        return self::where('berita_id', $berita_id)
            ->count();
    }
}
