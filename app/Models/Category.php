<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    //一對多關係屬性
    public function Product(){
        //一對多關係完整寫法-hasMany(model,'外鍵','參考的欄位');
        //return $this->hasMany(Product::class,'category_id','id');
        //一對多關係簡易寫法-有照laravel命名慣例，所以可以簡寫
        return $this->hasMany(Product::class);
    }
}
