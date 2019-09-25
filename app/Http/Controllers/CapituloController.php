<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapituloController extends Controller
{
    

    public function index() 
    {

        return view('capitulos.index');
    }

    public function store()
    {

    }
}
