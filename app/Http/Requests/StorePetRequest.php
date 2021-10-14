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
        abort_if(
            Gate::denies('pet_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'age' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'pet_type_id' => [
                'integer',
                'exists:pettypes,id',
                'required',
            ],
            'pet_gender_id' => [
                'integer',
                'exists:pet_genders,id',
                'required',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'breed' => [
                'string',
                'required',
            ],
        ];
    }
}
