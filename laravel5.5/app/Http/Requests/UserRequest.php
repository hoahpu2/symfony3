<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /** 
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                'fullname' => 'required',
                'password' => 'required',
            ];
        }else {
            return [
                'fullname' => 'required'
            ];
        }

    }

    public function messages ()
    {
        return[
            'fullname.required' => 'Vui long chon danh muc',
            'password.required' => 'Vui long nhap ten san pham',
            'fullname.unique' => 'Ten ko duoc trung nhau',
            'img' => 'Vui long chon anh dai dien',
            'img' => 'Vui long chon dung igame'
        ];
    }
}
