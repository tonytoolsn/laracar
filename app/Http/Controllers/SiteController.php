<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Calendar;
use Carbon\Carbon;
use Auth;
use App\Http\Requests\OrderRequest;

use App\Models\Slide;

class SiteController extends Controller
{
    public function index(){

        $categories=Category::get();
        $products=Product::get();
        $calendars=Calendar::get();
        $today=Carbon::today()->toDateString();
        (auth()->check())?($id = auth()->id()):($id = '');

         $slides = Slide::get();

        return view('index',compact('categories','products','calendars','today','id','slides'));
    }

    public function orderSubmit(OrderRequest $request){

        if(($request->input('user_id')) == ''){
            return redirect()->route('root')->with('msg', '表單送出失敗，請登入會員');
        }

        $data = $request->except('_token');
        $order = Order::create($data);

        return redirect()->route('root')->with('msg', '已成功下訂單，請至會員專區查看訂單狀態');
    }
}
