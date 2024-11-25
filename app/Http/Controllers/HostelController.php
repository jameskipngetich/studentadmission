<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostelController extends Controller
{
    //
    public function index(){
        return view('hostels.index');
    }
}

