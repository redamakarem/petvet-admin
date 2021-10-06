<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    protected function rules(): array
    {
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.locale' => [
                'string',
                'nullable',
            ],
            'user.vet_proffesion_id' => [
                'integer',
                'exists:vet_proffesions,id',
                'nullable',
            ],
            'mediaCollections.user_avatar' => [
                'array',
                'nullable',
            ],
            'mediaCollections.user_avatar.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.user_certifications' => [
                'array',
                'nullable',
            ],
            'mediaCollections.user_certifications.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'user.years_of_experience' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'user.current_location_id' => [
                'integer',
                'exists:vet_locations,id',
                'nullable',
            ],
            'user.phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
