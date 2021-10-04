<?php

namespace App\Http\Livewire\Pettype;

use App\Models\Pettype;
use Livewire\Component;

class Create extends Component
{
    public Pettype $pettype;

    public function mount(Pettype $pettype)
    {
        $this->pettype = $pettype;
    }

    public function render()
    {
        return view('livewire.pettype.create');
    }

    public function submit()
    {
        $this->validate();

        $this->pettype->save();

        return redirect()->route('admin.pettypes.index');
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
