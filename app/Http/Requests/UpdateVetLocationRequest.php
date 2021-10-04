<?php

namespace App\Http\Requests;

use App\Models\VetLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVetLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vet_location_edit');
    }

    protected function rules(): array
    {
        return [
            'vetLocation.name' => [
                'string',
                'required',
            ],
        ];
    }
}
