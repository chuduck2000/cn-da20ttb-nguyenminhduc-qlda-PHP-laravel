<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Lop extends Model
{
    use HasFactory;
    protected $table = 'lop';

    static public function getRecord()
    {
        $return = Lop::select('lop.*');

        if (!empty(Request::get('name'))) {
            $return = $return->where('lop.name', 'like', '%' . Request::get('name') . '%');
        }

        $return = $return->where('lop.is_delete', '=', 0)
            ->orderBy('lop.id', 'desc')
            ->paginate(10);

        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getLop()
    {
        $return = Lop::select('lop.*')
            ->where('lop.is_delete', '=', 0)
            ->where('lop.trangthai', '=', 0)
            ->orderBy('lop.name', 'asc')
            ->get();

        return $return;
    }
}
