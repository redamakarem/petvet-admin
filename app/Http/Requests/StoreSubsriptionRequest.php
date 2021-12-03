<?php

namespace App\Http\Requests;

use App\Models\Subsription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubsriptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('subsription_create'),
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
            'subscription_user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }
}
