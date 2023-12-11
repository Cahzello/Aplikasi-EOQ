<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calculate;
use App\Models\Product;
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
            'active' => 'user',
            'responses' => User::all()
        ]);
    }

    public function showData()
    {   
        return view('listdata',[
            'active' => 'listdata',
            'responses' => Calculate::all()
        ]);
    }

    public function editPage(Product $data)
    {
        return view('editpage', [
            'active' => 'editpage',
            'response' => $data
        ]);
    }
}

