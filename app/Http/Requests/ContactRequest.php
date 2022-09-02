<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|max:30',
            'gender' => 'required',
            'email' => 'required|email:filter,dns',
            'review1' => 'required',
            'review2' => 'required',
            'review3' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '※名前を入力してください',
            'name.max' => '※名前は30文字以内で入力してください',
            'gender.required' => '※性別を選択してください',
            'email.email' => '※正しいメールアドレスを入力してください',
            'email.required' => '※メールアドレスを入力してください',
            'opinion.max' => '※ご意見は120文字以内で入力してください'
        ];
    }

    public function prepareForValidation()
    {
        
    }
}
