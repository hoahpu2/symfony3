<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
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
       if (!request()->input('id')) {
         return [
            'catid' => 'required',
            'name' => 'required',
            
            
        ];
       }else {
            return [
            'name' => 'required'
            
            ];
     }
        
    }

    public function messages ()
    {
        return[
            'catid.required' => 'Vui long chon danh muc',
            'name.required' => 'Vui long nhap ten san pham',
            'name.unique' => 'Ten ko duoc trung nhau',
            'img' => 'Vui long chon anh dai dien',
            'img' => 'Vui long chon dung igame'
        ];
    }
}
