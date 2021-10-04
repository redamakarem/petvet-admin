<?php

namespace App\Http\Livewire\PetGender;

use App\Models\PetGender;
use Livewire\Component;

class Create extends Component
{
    public PetGender $petGender;

    public function mount(PetGender $petGender)
    {
        $this->petGender = $petGender;
    }

    public function render()
    {
        return view('livewire.pet-gender.create');
    }

    public function submit()
    {
        $this->validate();

        $this->petGender->save();

        return redirect()->route('admin.pet-genders.index');
    }

    protected function rules(): array
    {
        return [
            'petGender.name' => [
                'string',
                'required',
            ],
        ];
    }
}
