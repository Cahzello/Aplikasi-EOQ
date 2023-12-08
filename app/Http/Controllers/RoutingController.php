<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController extends Controller
{
    public function index () {
        return back();
    }

    public function homePage() {
        return view('homepage', [
            'active' => 'homepage'
        ]);
    }

    public function inputData(){
        return view('inputdata', [
            'active' => 'Input'
        ]);
    }

    public function userPage (){
        return view('user', [
            'active' => 'user'
        ]);
    }
}
