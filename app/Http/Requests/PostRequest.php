<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'body' => 'required_without:URL|max:1000',
            'URL' => 'required_without:body|max:200',
        ];
    }
    
    public function messages(): array
    {
        return [
            'body.required_without' => '感想またはURLを入力してください',
            'URL.required_without' => '感想またはURLを入力してください',
            'body.max' => '1000文字以内で感想を記入してください',
            'URL.max' => '200文字以内でURLを記入してください',
            ];
    }
}
