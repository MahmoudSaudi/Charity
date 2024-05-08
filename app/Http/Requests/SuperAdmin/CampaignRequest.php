<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'title' =>           'required|string',
            'description' =>     'required|string',
            'organization_id'   =>  'required | exists:App\Models\Organization,id',
            'target_amount' =>   'required|string',
            'current_amount' =>  'required|string',
            'end_date' =>        'required|date',
            'start_date' =>      'required|date',
            'image'    =>        'required|image|mimes:jpeg,png,jpg,gif,svg,webp'

        ];
    }
}
