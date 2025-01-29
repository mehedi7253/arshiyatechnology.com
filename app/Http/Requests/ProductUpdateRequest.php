<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name'              => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:products,slug,' . $this->product->id,
            'sku'               => 'required|string|max:255|unique:products,sku,' . $this->product->id,
            'regular_price'     => 'required|numeric',
            'discount_price'    => 'nullable|numeric',
            'thumbnail'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'       => 'required|array',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'             => 'Product name is required',
            'name.string'               => 'Product name must be a string',
            'name.max'                  => 'Product name must not be greater than 255 characters',
            'slug.required'             => 'Product slug is required',
            'slug.string'               => 'Product slug must be a string',
            'slug.max'                  => 'Product slug must not be greater than 255 characters',
            'slug.unique'               => 'Product slug must be unique',
            'sku.required'              => 'Product SKU is required',
            'sku.string'                => 'Product SKU must be a string',
            'sku.max'                   => 'Product SKU must not be greater than 255 characters',
            'sku.unique'                => 'Product SKU must be unique',
            'regular_price.required'    => 'Product regular price is required',
            'regular_price.numeric'     => 'Product regular price must be a number',
            'discount_price.numeric'    => 'Product discount price must be a number',
            'thumbnail.image'           => 'Product thumbnail must be an image',
            'thumbnail.mimes'           => 'Product thumbnail must be a file of type: jpeg, png, jpg, gif, svg',
            'thumbnail.max'             => 'Product thumbnail must not be greater than 2048 kilobytes',
            'category_id.required'      => 'Product category is required',
        ];
    }
}
