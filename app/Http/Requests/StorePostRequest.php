<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|min:6',
            'detail' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tên bài viết không được để trống',
            'title.min' => 'Tên bài viết ít nhất 6 kí tự',
            'detail.required' => 'Phần chi tiết không được để trống',
        ];
    }
}
