<?php

namespace App\Http\Controllers\Site;

use App\Uf;
use App\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class EnderecoController extends BaseController
{
  public function __construct()
  {
    $this->classe = Endereco::class;
    $this->tipo = 'endereco';
  }

}
