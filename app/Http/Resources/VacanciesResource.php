<?php

namespace App\Http\Resources;

use App\Http\Enums\DynamicFields;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
class VacanciesResource extends JsonResource
{

    public static function getDynamicFields(Request $request)
    {
        $exploded = $request->query('fields');
        if (!is_array($exploded)) {
            $exploded = explode(',', $exploded);
        }

        $exploded = array_combine(
            array_map(
                fn($v) =>
                trim($v)
                ,
                $exploded
            ),
            array_map(
                fn($v) =>
                true
                ,
                $exploded
            )
        );

        return array_filter($exploded, fn($k) => DynamicFields::tryFrom($k), ARRAY_FILTER_USE_KEY);

    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $fields = $this->getDynamicFields($request);

        $dynamicRules = [];

        foreach ($fields as $key => $value) {
            $dynamicRules[$key] = $this->$key;
        }


        return array_merge([
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'salary' => $this->salary,
        ], $dynamicRules);
    }
}
