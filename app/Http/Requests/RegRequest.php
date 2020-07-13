<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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

        return [
           'email'=> 'required|email|unique:user,email',
            'name' => 'required|regex:/^[A-Z\Ć\Š\Ž\Č\Đ][a-z\š\đ\ž\č\ć]{2,19}$/',
            'lastname' => 'required|regex:/^([A-Z\Ć\Š\Ž\Č\Đ][a-z\š\đ\ž\č\ć]{2,29})(\s[A-Z\Ć\Š\Ž\Č\Đ][a-z\š\đ\ž\č\ć]{2,29})*$/',
            'pass1' => 'required|regex:/^[A-Z\Ć\Š\Ž\Č\Đa-z\š\đ\ž\č\ć0-9]{5,30}$/'
        ];

   }
    public function messages()
    {
        return [
            'required' => "The :attribute field is required",

        ];
    }
}
