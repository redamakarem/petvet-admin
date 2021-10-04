<?php

namespace App\Http\Requests;

use App\Models\VetProffesion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVetProffesionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vet_proffesion_edit');
    }

    protected function rules(): array
    {
        return [
            'vetProffesion.name' => [
                'string',
                'required',
            ],
        ];
    }
}
