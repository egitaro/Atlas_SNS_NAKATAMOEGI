<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
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
            'update' => 'required|min:8|max:200'
        ];
    }

    public function messages()
    {
        return [
            'update.required' => '投稿内容を入力してください',
            'update.min' => '文字数は8文字以上にしてください',
            'update.max' => '文字数は200文字以内にしてください'
        ];
    }
}
