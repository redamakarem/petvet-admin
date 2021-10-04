<?php

namespace App\Http\Requests;

use App\Models\MedicalHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMedicalHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('medical_history_edit');
    }

    protected function rules(): array
    {
        return [
            'medicalHistory.title' => [
                'string',
                'required',
            ],
            'medicalHistory.record_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'medicalHistory.record_pet_id' => [
                'integer',
                'exists:pets,id',
                'nullable',
            ],
            'medicalHistory.record_user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
