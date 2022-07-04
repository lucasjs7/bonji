<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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
        $id = $this->product->id ?? '';
        $unique = $this->isMethod('PUT')
                    ? "products,slug,{$id},id"
                    : 'products,slug';

        return [
            'name'              => 'required|string|min:3|max:255',
            'code'              => 'nullable|string|max:255',
            'small_description' => 'nullable|string|max:255',
            'description'       => 'nullable|string|max:99999',
            'price'             => 'required|string',
            'discount'          => 'nullable|integer|min:1|max:100',
            'weight'            => 'nullable|string',
            'height'            => 'nullable|integer|min:1',
            'width'             => 'nullable|integer|min:1',
            'length'            => 'nullable|integer|min:1',
            'page_title'        => 'nullable|string|max:255',
            'slug'              => [
                'required',
                'string',
                "unique:{$unique}",
                'min:3',
                'max:255'
            ],
            'meta_description'  => 'nullable|string|max:255'
        ];
    }
}
