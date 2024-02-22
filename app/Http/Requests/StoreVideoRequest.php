<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
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
            "title" => 'required | unique:App\Models\Video,title',
            "original_title" => 'nullable',
            "sinopse" => 'nullable',
            "type" => 'required',
            "score" => 'numeric',
            "personal_score" => 'numeric',
            "watched" => 'boolean',
            "notes" => 'nullable',
            "director_id" => 'numeric',
            "studio_id" => 'required | numeric',
        ];
    }
}
