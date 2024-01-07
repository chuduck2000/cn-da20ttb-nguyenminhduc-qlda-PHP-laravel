<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Doan extends Model
{
    use HasFactory;
    protected $table = 'doan';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = Doan::select('doan.*', 'users.name as created_by')
            ->join('users', 'users.id', '=', 'doan.created_by');

        if (!empty(Request::get('name'))) {
            $return = $return->where('doan.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('type'))) {
            $return = $return->where('doan.type', 'like', '%' . Request::get('type') . '%');
        }

        $return = $return->where('doan.is_delete', '=', 0)
            ->orderBy('doan.id', 'desc')
            ->paginate(10);

        return $return;
    }
}
