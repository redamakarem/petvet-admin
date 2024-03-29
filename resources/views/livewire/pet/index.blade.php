<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('pet_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Pet" format="csv" />
                <livewire:excel-export model="Pet" format="xlsx" />
                <livewire:excel-export model="Pet" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.pet.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.pet.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.pet.fields.age') }}
                            @include('components.table.sort', ['field' => 'age'])
                        </th>
                        <th>
                            {{ trans('cruds.pet.fields.avatar') }}
                        </th>
                        <th>
                            {{ trans('cruds.pet.fields.pet_type') }}
                            @include('components.table.sort', ['field' => 'pet_type.name'])
                        </th>
                        <th>
                            {{ trans('cruds.pet.fields.pet_gender') }}
                            @include('components.table.sort', ['field' => 'pet_gender.name'])
                        </th>
                        <th>
                            {{ trans('cruds.pet.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.pet.fields.breed') }}
                            @include('components.table.sort', ['field' => 'breed'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pets as $pet)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $pet->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $pet->id }}
                            </td>
                            <td>
                                {{ $pet->name }}
                            </td>
                            <td>
                                {{ $pet->age }}
                            </td>
                            <td>
                                @foreach($pet->avatar as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @if($pet->petType)
                                    <span class="badge badge-relationship">{{ $pet->petType->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($pet->petGender)
                                    <span class="badge badge-relationship">{{ $pet->petGender->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($pet->user)
                                    <span class="badge badge-relationship">{{ $pet->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $pet->breed }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('pet_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.pets.show', $pet) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('pet_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.pets.edit', $pet) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('pet_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $pet->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $pets->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush