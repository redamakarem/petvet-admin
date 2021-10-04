<?php

namespace App\Http\Requests;

use App\Models\Todo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTodoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('todo_create');
    }

    protected function rules(): array
    {
        return [
            'todo.title' => [
                'string',
                'required',
            ],
            'todo.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }
}
