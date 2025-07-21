<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RequiredIfExists;


class UpdatePageRequest extends FormRequest
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
            'title' => 'required',
            'slug' => [new RequiredIfExists('slug')],
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'view_path' => [new RequiredIfExists(field: 'view_path')]
        ];
    }
}
