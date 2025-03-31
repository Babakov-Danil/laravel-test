<?php

namespace App\Http\Requests\Vacancies;

use App\Http\Enums\SortBy;
use App\Http\Enums\SortType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class IndexRequest extends FormRequest
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
            'fields' => ['string_or_array'],
            'sort_by' => [new Enum(SortBy::class), 'nullable'],
            'sort_type' => [new Enum(SortType::class), 'nullable'],
        ];
    }
}
