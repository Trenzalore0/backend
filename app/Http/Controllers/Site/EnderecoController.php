<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Api\BaseController;
use App\Models\Endereco;

class EnderecoController extends BaseController
{
  public function __construct()
  {
    $this->classe = Endereco::class;
    $this->tipo = 'endereco';
  }

}
