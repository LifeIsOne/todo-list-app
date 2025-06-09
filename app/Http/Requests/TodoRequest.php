<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'text' => [
                'required',
                'string',
                'min:2',
                'max:50',
                'unique:todos,text,' . ($id ?? '')
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => '내용을 입력해주세요!',
            'text.min' => '2자 이상 50자 이하여야 합니다!',
            'text.max' => '2자 이상 50자 이하여야 합니다!',
            'text.unique' => '중복된 내용입니다!'
        ];
    }
}
