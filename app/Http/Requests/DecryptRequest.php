<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * DecryptRequest - 解密请求验证
 */
class DecryptRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'max:100'],
            'redirect' => ['required', 'string'],
            'hash' => ['nullable', 'string'],
            'query' => ['nullable', 'string'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'password.required' => '请输入密码',
            'password.max' => '密码最长 100 个字符',
        ];
    }

    /**
     * 获取解密后的重定向路径
     *
     * @return string
     */
    public function getRedirectPath(): string
    {
        return trans_absolute_path(rawurldecode($this->input('redirect')));
    }
}