<?php

namespace App\Http\Requests;

use App\Models\PetGender;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePetGenderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pet_gender_edit');
    }

    protected function rules(): array
    {
        return [
            'petGender.name' => [
                'string',
                'required',
            ],
        ];
    }
}
