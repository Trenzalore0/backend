<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;

class loginController extends BaseController
{
    public function __construct()
    {
        $this->class = Login::class;
    }


        
 
}
