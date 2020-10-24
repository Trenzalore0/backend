<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $class;

    public function listAll()
    {
        return response()->json($this->class::all(), 200);
    }
}
