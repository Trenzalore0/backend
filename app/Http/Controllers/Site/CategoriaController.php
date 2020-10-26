<?php

namespace App\Http\Controllers\Site;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends BaseController
{
    public function __construct()
    {
        $this->classe = Categoria::class;
        $this->tipo = 'categoria';
    }
}
