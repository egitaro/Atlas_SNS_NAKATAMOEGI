<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsFormRequest extends FormRequest
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
    public function rules()  //確報間違えた　postsの内容に書き換える
    {
        return [
            'post' => 'required|min8|max:200',
            'update' => 'required|min8|max:200'
        ];
    }

    public function messages()
    {
        return [
            'post.required' => 'ユーザー名を入力してください',
            'post.min' => '文字数は8文字以上にしてください',
            'post.max' => '文字数は200文字以内にしてください',
            'update.required' => 'ユーザー名を入力してください',
            'update.min' => '文字数は8文字以上にしてください',
            'update.max' => '文字数は200文字以内にしてください'
        ];
    }
}
