<?php

namespace App\Http\Livewire\VetProffesion;

use App\Models\VetProffesion;
use Livewire\Component;

class Create extends Component
{
    public VetProffesion $vetProffesion;

    public function mount(VetProffesion $vetProffesion)
    {
        $this->vetProffesion = $vetProffesion;
    }

    public function render()
    {
        return view('livewire.vet-proffesion.create');
    }

    public function submit()
    {
        $this->validate();

        $this->vetProffesion->save();

        return redirect()->route('admin.vet-proffesions.index');
    }

    protected function rules(): array
    {
        return [
            'vetProffesion.name' => [
                'string',
                'required',
            ],
        ];
    }
}
