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
use Illuminate\Support\Facades\Log;
use NewebPay;

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
        $request->session()->flush();
        //將表單資料用session()，先存起來
        $request->session()->push('data',$data);
        $datas = $request->session()->get('data');
        dd($datas);

        $newebpay = new NewebPay();  //使用此物件要記得use
        $deposit=$request->deposit;
        $pattern=$request->pattern;
        $email=$request->email;
        return $newebpay->payment(
        Carbon::now()->timestamp,    // 訂單編號
        $deposit,                    // 交易金額
        $pattern,                    // 商品名稱
        $email                       // 付款人信箱
        )->submit();
    }

    public function successRedirect(Request $request){
        $data = $request->session()->get('data');
        dd($data);
        if($data){
          foreach ($data as $value) {
              $data = $value;
          }
          Order::create($data);
          $request->session()->flush();
        }
        return redirect()->route('root')->with('msg', '已成功下訂單，請至會員專區查看訂單狀態');
    }

    public function orderSuccess(Request $request){
        Log::info('app.requests',['request' => $request->all()]); //藍星金流回傳的資料
        return redirect()->route('root');
    }

      public function back(Request $request){
        $request->session()->flush();
        return redirect()->route('root')->with('msg', '訂單取消!!');
    }
}
