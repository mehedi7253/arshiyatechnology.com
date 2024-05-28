<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
     //middleware call
     public function __construct()
     {
        $this->middleware('mail-service');
     }
}
