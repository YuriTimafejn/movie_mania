<?php

namespace App\Http\Requests;

use App\Rules\VideoTypeRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVideoRequest extends FormRequest
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
            "title" => 'unique:App\Models\Video,title',
            "original_title" => 'nullable',
            "sinopse" => 'nullable',
            "type" => [new VideoTypeRule],
            "score" => 'numeric',
            "personal_score" => 'numeric',
            "watched" => 'boolean',
            "notes" => 'nullable',
            "director_id" => 'nullable | numeric | exists:directors,id',
            "studio_id" => 'nullable | numeric | exists:studios,id',
        ];
    }
}
