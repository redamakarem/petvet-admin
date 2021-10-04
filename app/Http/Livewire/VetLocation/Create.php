<?php

namespace App\Http\Livewire\VetLocation;

use App\Models\VetLocation;
use Livewire\Component;

class Create extends Component
{
    public VetLocation $vetLocation;

    public function mount(VetLocation $vetLocation)
    {
        $this->vetLocation = $vetLocation;
    }

    public function render()
    {
        return view('livewire.vet-location.create');
    }

    public function submit()
    {
        $this->validate();

        $this->vetLocation->save();

        return redirect()->route('admin.vet-locations.index');
    }

    protected function rules(): array
    {
        return [
            'vetLocation.name' => [
                'string',
                'required',
            ],
        ];
    }
}
