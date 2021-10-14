<?php

namespace App\Http\Requests;

use App\Models\Message;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMessageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('message_edit'),
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
            'sender_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'receiver_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'message_text' => [
                'string',
                'nullable',
            ],
        ];
    }
}
