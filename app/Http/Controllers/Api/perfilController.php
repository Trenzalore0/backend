<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Perfil;
use Illuminate\Http\Request;

class perfilController extends BaseController
{
    public function __construct()
    {
        $this->class = Perfil::class;
    }

    public function create(Request $req)
    {
        return response()->json(Perfil::create($req->all()), 201);
    }

    public function select($id)
    {
        $item = Perfil::find($id);
        return response()->json($item, 200);
    }
}
