<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['user_id','name','phone','email','pattern','rent','deposit','place','fawdays','usedate','returndate','remark','orderstatus','adminremark',];

    //多對多關係屬性
    public function Product(){
        //多對多關係完整寫法-belongsToMany(model,'外鍵','參考的欄位');
        //return $this->belongsToMany(Product::class,'product_id');
        //多對多關係簡易寫法-有照laravel命名慣例，所以可以簡寫
        return $this->belongsToMany(Product::class);
    }

    //一對一關係屬性
    public function User(){
        //一對一關係完整寫法-belongsTo(model,'外鍵','參考的欄位');
        //return $this->belongsTo(User::class,'user_id','id');
        //一對一關係簡易寫法-有照laravel命名慣例，所以可以簡寫
        return $this->belongsTo(User::class);
    }
}
