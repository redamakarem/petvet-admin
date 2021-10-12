<?php

namespace App\Http\Livewire\Pet;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Pet;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Pet())->orderable;
    }

    public function render()
    {
        $query = Pet::with(['petType', 'petGender', 'user'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $pets = $query->paginate($this->perPage);

        return view('livewire.pet.index', compact('query', 'pets', 'pets'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Pet::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Pet $pet)
    {
        abort_if(Gate::denies('pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet->delete();
    }
}
