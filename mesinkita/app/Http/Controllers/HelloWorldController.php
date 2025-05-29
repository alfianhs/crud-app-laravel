<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function showHelloWorld(){
        return view('hello_world');
    }
}
