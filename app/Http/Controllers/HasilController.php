<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index(){
        return view("result.index");
    }

    public function create(){
        return view('result.create');
    }


}
