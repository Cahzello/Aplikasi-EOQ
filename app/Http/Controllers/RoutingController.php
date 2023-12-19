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
    public function userProfile() {
        return view('profile', [
            'active' => 'profile'
        ]);
    }

    public function inputData(){
        return view('inputdata', [
            'active' => 'input'
        ]);
    }

    public function userPage (){
        $this->authorize('admin');
        return view('user', [
            'active' => 'user',
            'responses' => User::all()
        ]);
    }

    public function showData()
    {   
        $user = User::find(auth()->user()->id);
        $products = $user->products;
        $calculates = $products->flatMap->calculates;

        return view('listdata',[
            'active' => 'listdata',
            'responses' => $calculates,
        ]);
    }

    public function listData(Calculate $data)
    {
        return view('details', [
            'active' => 'listdata',
            'response' => $data
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

