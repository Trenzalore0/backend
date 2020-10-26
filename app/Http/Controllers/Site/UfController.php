<?php

namespace App\Http\Controllers\Site;

use App\Models\Uf;

class UfController extends BaseController
{
    public function __construct()
    {
        $this->classe = Uf::class;
        $this->tipo = 'uf';
    }
}
