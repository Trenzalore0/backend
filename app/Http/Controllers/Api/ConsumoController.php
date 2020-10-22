<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Uf;
use Illuminate\Http\Request;

class ConsumoController extends Controller
{
    public function listUF()
    {
        return response()->json(Uf::all(), 200);
    }
}
