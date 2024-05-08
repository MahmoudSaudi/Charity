<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
            'name' =>             'required|string',
            'email' =>            'required|email',
            'address' =>          'required|string',
            'description' =>      'required|string',
            'phone_number' =>     'required|string',
            'password' =>         'required',
            'image'    =>         'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'established_year' => 'required',
            'registration_date' => 'required',
            'is_active' =>         'nullable',
            'has_delegate' =>      'nullable'

        ];
    }
}
