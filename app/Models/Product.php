<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    //一對一關係屬性
    public function Category(){
        //一對一關係完整寫法-belongsTo(model,'外鍵','參考的欄位');
        //return $this->belongsTo(Category::class,'Category_id','id');
        //一對一關係簡易寫法-有照laravel命名慣例，所以可以簡寫
        return $this->belongsTo(Category::class);
    }

    //多對多關係屬性
    public function Order(){
        //多對多關係完整寫法-belongsToMany(model,'外鍵','參考的欄位');
        //return $this->belongsToMany(Order::class,'order_id');
        //多對多關係簡易寫法-有照laravel命名慣例，所以可以簡寫
        return $this->belongsToMany(Order::class);
    }
}
