<?php

namespace App\Http\Requests;

use App\Enums\ProductSizeType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:products,name,'.$this->id.',id',
            'size' => ['required', 'unique:products,size,'.$this->id.',id'],
            'price' => 'required|numeric',
            'sale'  => 'required|numeric',
            'description' => 'nullable|string'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
