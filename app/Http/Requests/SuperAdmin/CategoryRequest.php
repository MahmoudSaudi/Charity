<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'organization_id'   =>  'required | exists:App\Models\Organization,id',
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp'
        ];
    }
}
