<?php

namespace App\Http\Livewire\Message;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Message $message;

    public array $listsForFields = [];

    public function mount(Message $message)
    {
        $this->message = $message;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.message.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->message->save();

        return redirect()->route('admin.messages.index');
    }

    protected function rules(): array
    {
        return [
            'message.sender_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'message.receiver_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'message.message_text' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['sender']   = User::pluck('name', 'id')->toArray();
        $this->listsForFields['receiver'] = User::pluck('name', 'id')->toArray();
    }
}
