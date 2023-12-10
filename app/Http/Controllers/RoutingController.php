<?php

namespace App\Http\Controllers;

use App\Models\Calculate;
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
            'active' => 'input'
        ]);
    }

    public function userPage (){
        return view('user', [
            'active' => 'user'
        ]);
    }

    public function showData()
    {   
        return view('listdata',[
            'active' => 'listdata',
            'response' => Calculate::all()
        ]);
    }
}
