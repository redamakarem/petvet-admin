<?php

namespace App\Http\Livewire\Pet;

use App\Models\Pet;
use App\Models\PetGender;
use App\Models\Pettype;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Pet $pet;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Pet $pet)
    {
        $this->pet = $pet;
        $this->initListsForFields();
        $this->mediaCollections = [
            'pet_avatar' => $pet->avatar,
        ];
    }

    public function render()
    {
        return view('livewire.pet.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->pet->save();
        $this->syncMedia();

        return redirect()->route('admin.pets.index');
    }

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function rules(): array
    {
        return [
            'pet.name' => [
                'string',
                'required',
            ],
            'pet.age' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'mediaCollections.pet_avatar' => [
                'array',
                'nullable',
            ],
            'mediaCollections.pet_avatar.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'pet.pet_type_id' => [
                'integer',
                'exists:pettypes,id',
                'required',
            ],
            'pet.pet_gender_id' => [
                'integer',
                'exists:pet_genders,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['pet_type']   = Pettype::pluck('name', 'id')->toArray();
        $this->listsForFields['pet_gender'] = PetGender::pluck('name', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->pet->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
