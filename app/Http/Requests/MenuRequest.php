<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'menu_name' => 'required',
            'kana' => 'required',
            'limited' => 'max:14',
            'photo' => 'max:10240',
        ];
    }
    public function messages()
    {
        return [
            'menu_name.required' => '※料理名を入力してください',
            'kana.required' => '※かなを入力してください',
            'limited.max' => '※14文字以内で入力してください',
            'photo.max' => '※画像ファイルサイズを10MB未満にしてください',
            
        ];
    }
    public function prepareForValidation()
    {
        $this->merge(['menu_name'=> mb_convert_kana($this->menu_name, 'as')]);
        $this->merge(['kana'=> mb_convert_kana($this->kana, 'asHc')]);
        $this->merge(['limited'=> mb_convert_kana($this->limited, 'as')]);
        $this->merge(['search_word'=> mb_convert_kana($this->search_word, 'as')]);
    }
}
