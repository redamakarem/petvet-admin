<?php

namespace App\Http\Requests;

use App\Models\Pet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pet_create');
    }

    protected function rules(): array
    {
        return [
            'pet.name' => [
                'string',
                'required',
            ],
            'pet.age' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'mediaCollections.pet_avatar' => [
                'array',
                'nullable',
            ],
            'mediaCollections.pet_avatar.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'pet.pet_type_id' => [
                'integer',
                'exists:pettypes,id',
                'required',
            ],
            'pet.pet_gender_id' => [
                'integer',
                'exists:pet_genders,id',
                'required',
            ],
            'pet.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }
}
