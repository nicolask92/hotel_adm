<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladordeVistas extends Controller
{
    public function inicio(){
        return view('index');
    }
}
