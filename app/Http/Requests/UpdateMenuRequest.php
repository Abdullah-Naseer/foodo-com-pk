<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'menu_type_id' => 'required|exists:menu_types,id',
            'day' => 'required|string',
            'week' => 'required|string',
            'image' => 'nullable|image|mimes:webp|max:2048',
            'description' => 'required|string',
        ];
    }
}
