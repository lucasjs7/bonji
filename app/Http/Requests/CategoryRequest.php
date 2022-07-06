<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::of($this->slug ?? $this->name)->slug('-')->value
        ]);
    }

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->category->id ?? '';
        $unique = $this->isMethod('PUT') ? ",{$id},id" : '';

        return [
            'name'        => [
                'required',
                'string',
                "unique:categories,name{$unique}",
                'min:3',
                'max:255'
            ],
            'slug'        => [
                'required',
                'string',
                "unique:categories,slug{$unique}"
            ],
            'description' => 'nullable|string|min:3|max:9999'
        ];
    }
}
