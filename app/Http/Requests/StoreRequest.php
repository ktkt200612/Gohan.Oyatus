<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'outside_photo' => 'max:10240',
            'inside_photo' => 'max:10240',
            'store_name' => 'required|max:36',
            'kana' => 'required',
            'area' => 'required',
            'store_address' => 'required|max:40',
            'genre1' => 'required',
            'regular_holiday' => 'max:30',
            'business_hours' => 'max:30',
            'store_phone_number' => 'nullable|max:99999999999999|numeric',
        ];
    }
    public function messages()
    {
        return [
            'outside_photo.max' => '※画像ファイルサイズを10MB未満にしてください',
            'inside_photo.max' => '※画像ファイルサイズを10MB未満にしてください',
            'store_name.required' => '※店舗名を入力してください',
            'store_name.max' => '※36文字以内で入力してください',
            'kana.required' => '※かなを入力してください',
            'area.required' => '※店舗エリアを選択してください',
            'store_address.required' => '※店舗住所を入力してください',
            'store_address.max' => '※40文字以内で入力してください',
            'genre1.required' => '※ジャンルを1つ以上選択してください',
            'regular_holiday.max' => '※30文字以内で入力してください',
            'business_hours.max' => '※30文字以内で入力してください',
            'store_phone_number.numeric' => '※数字で入力してください(ハイフン無し)',
            'store_phone_number.max' => '※14文字以内で入力してください',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
        'store_name'=> mb_convert_kana($this->store_name, 'as'),
        'kana'=> mb_convert_kana($this->kana, 'asHc'),
        'store_address'=> mb_convert_kana($this->store_address, 'as'),
        'regular_holiday'=> mb_convert_kana($this->regular_holiday, 'as'),
        'business_hours'=> mb_convert_kana($this->business_hours, 'as'),
        'store_phone_number'=> mb_convert_kana($this->store_phone_number, 'as'),
        ]);
    }
}
