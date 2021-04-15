<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *false要改為true
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',                 //承租人
            'phone'=>'required|digits:10',      //電話
            'email'=>'required|email',          //電子郵件
            'pattern'=>'required|',             //預定車型
            'rent'=>'required|integer',         //總計租金
            'deposit'=>'required|integer',      //訂金
            'place'=>'required',                //租車地點
            'fawdays'=>'required|integer',      //共計幾天
            'usedate'=>'required',              //使用日期
            'returndate'=>'required',           //還車日期
            'remark'=>'nullable',               //備註
            'orderstatus'=>'required',          //定單狀態
            'adminremark'=>'nullable',          //管理員備註用
            'user_id'=>'nullable',              //使用者外鍵
        ];
    }

    public function messages()
    {
        return [
            'required'=>'不可為空白',
            'digits'=>'長度須為10',
            'email'=>'須為email格式',
            'integer'=>'須為整數',
        ];
    }
}
