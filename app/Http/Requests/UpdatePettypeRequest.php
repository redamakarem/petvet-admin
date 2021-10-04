<?php

namespace App\Http\Requests;

use App\Models\Pettype;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePettypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pettype_edit');
    }

    protected function rules(): array
    {
        return [
            'pettype.name' => [
                'string',
                'required',
            ],
        ];
    }
}
