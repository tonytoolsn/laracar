@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <table class="example" >
        <thead>
            <tr>
                <td>租車人</td>
                <td>電話</td>
                <td>電子郵件</td>
                <td>預定車</td>
                <td>租金計算</td>
                <td>訂金金額</td>
                <td>租車地點</td>
                <td>共計幾天</td>
                <td>使用日期</td>
                <td>還車日期</td>
                <td>備註</td>
                <td>訂單狀態</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($orders as $order)
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->pattern}}</td>
                <td>{{$order->rent}}</td>
                <td>{{$order->deposit}}</td>
                <td>{{$order->place}}</td>
                <td>{{$order->fawdays}}</td>
                <td>{{$order->usedate}}</td>
                <td>{{$order->returndate}}</td>
                <td>{{$order->remark}}</td>
                <td>{{$order->orderstatus}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
