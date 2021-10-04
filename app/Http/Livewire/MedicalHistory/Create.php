<?php

namespace App\Http\Livewire\MedicalHistory;

use App\Models\MedicalHistory;
use App\Models\Pet;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public MedicalHistory $medicalHistory;

    public function mount(MedicalHistory $medicalHistory)
    {
        $this->medicalHistory = $medicalHistory;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.medical-history.create');
    }

    public function submit()
    {
        $this->validate();

        $this->medicalHistory->save();

        return redirect()->route('admin.medical-histories.index');
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

    protected function initListsForFields(): void
    {
        $this->listsForFields['record_pet']  = Pet::pluck('name', 'id')->toArray();
        $this->listsForFields['record_user'] = User::pluck('name', 'id')->toArray();
    }
}
