<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'username' => 'required|min:2|max:12',
            'mail' => 'required|email|min:5|max:40|unique:users',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'ユーザー名を入力してください',
            'username.min' => '文字数は2文字以上にしてください',
            'username.max' => '文字数は12文字以下にしてください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.min' => '文字数は5文字以上にしてください',
            'mail.max' => '文字数は40文字以内にしてください',
            'mail.unique' => '登録済みのユーザーです',
            'mail.email' => 'メールの形式が正しくありません',
            'password.required' => 'パスワードを入力してください',
            'password.alpha_num' => '英数字のみ使用してください',
            'password.min' => '文字数は8文字以上にしてください',
            'password.max' => '文字数は20文字以下にしてください',
            'password.confirmed' => 'パスワードが一致しません'
        ];
    }
}
