<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * QueryRequest - drive.query 路由验证
 */
class QueryRequest extends FormRequest
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
            'hash' => ['nullable', 'string'],
            'query' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string', 'max:100'],
            'sortBy' => ['nullable', 'string', 'regex:/^[a-zA-Z]+,(asc|desc)$/i'],
            'download' => ['nullable', 'boolean'],
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
            'keywords.max' => '搜索关键词最长 100 个字符',
            'sortBy.regex' => '排序参数格式错误，应为 "字段名,asc" 或 "字段名,desc"',
        ];
    }

    /**
     * 获取排序字段和方向
     *
     * @return array{column: string, direction: string}
     */
    public function getSortParams(): array
    {
        $sortBy = $this->input('sortBy', 'name');

        if (str_contains($sortBy, ',')) {
            [$column, $direction] = explode(',', $sortBy);
        } else {
            $column = $sortBy;
            $direction = 'asc';
        }

        return [
            'column' => strtolower($column),
            'direction' => strtolower($direction),
        ];
    }

    /**
     * 是否为降序排序
     *
     * @param string $field
     * @return bool
     */
    public function isDescending(string $field): bool
    {
        $sort = $this->getSortParams();

        if ($sort['column'] !== $field) {
            return false;
        }

        return $sort['direction'] === 'desc';
    }
}