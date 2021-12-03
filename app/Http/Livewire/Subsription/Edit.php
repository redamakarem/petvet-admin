<?php

namespace App\Http\Livewire\Subsription;

use App\Models\Subsription;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Subsription $subsription;

    public array $listsForFields = [];

    public function mount(Subsription $subsription)
    {
        $this->subsription = $subsription;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.subsription.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->subsription->save();

        return redirect()->route('admin.subsriptions.index');
    }

    protected function rules(): array
    {
        return [
            'subsription.subscription_user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['subscription_user'] = User::pluck('name', 'id')->toArray();
    }
}
