<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;

class Edit extends Component
{
    public Todo $todo;

    public function mount(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function render()
    {
        return view('livewire.todo.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->todo->save();

        return redirect()->route('admin.todos.index');
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
