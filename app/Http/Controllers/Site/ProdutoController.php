<?php

namespace App\Http\Controllers\Site;

use App\Produto;

class ProdutoController extends BaseController
{
    public function __construct()
    {
        $this->classe = Produto::class;
        $this->tipo = 'produto';
    }
}
