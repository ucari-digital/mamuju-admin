<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";

    public static function get_data()
    {
        return self::orderBy('created_at', 'desc')
            ->get();
    }

    public static function get_data_without($id)
    {
        return self::whereNotIn('id', [$id])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
