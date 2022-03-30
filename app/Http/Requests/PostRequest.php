<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'thumbnail' => 'file|max:1600|mimes:jpeg,png,jpg,pdf',
            'body' => 'required|string|max:1000',
        ];
    }

    public function messages(){
        return[
            'file.mimes'=>'この形式のファイルは添付することができません'
        ];
    }
}
