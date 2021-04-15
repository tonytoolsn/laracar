<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\UserUpdateRequest;

use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $orders = User::find(auth()->id())->order;
        return view('home',compact('orders'));
    }

    public function orderSearch()
    {
        return redirect()->route('home');
    }

    // user/edit
    public function edit()
    {
        return view('edit');
    }

    // user/update patch
    public function update(UserUpdateRequest $request)
    {

        $id = Auth::user()->id;
        $data=$request->except('_token','password');
        User::find($id)->update($data);
        return redirect()->route('edit');
    }
}
