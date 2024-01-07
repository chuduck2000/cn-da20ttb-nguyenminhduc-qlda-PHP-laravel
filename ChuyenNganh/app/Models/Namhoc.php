<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class Namhoc extends Model
{
    use HasFactory;
    protected $table = 'namhoc';

    static public function getRecord()
    {
        $return = Namhoc::select('namhoc.*');

        if (!empty(Request::get('name'))) {
            $return = $return->where('namhoc.name', 'like', '%' . Request::get('name') . '%');
        }

        $return = $return->where('namhoc.is_delete', '=', 0)
            ->orderBy('namhoc.id', 'desc')
            ->paginate(10);

        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getNamhoc()
    {
        $return = Namhoc::select('namhoc.*')
            ->where('namhoc.is_delete', '=', 0)
            ->orderBy('namhoc.name', 'asc')
            ->get();

        return $return;
    }
}
