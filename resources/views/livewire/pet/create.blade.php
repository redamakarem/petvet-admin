<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('pet.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.pet.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="pet.name">
        <div class="validation-message">
            {{ $errors->first('pet.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pet.age') ? 'invalid' : '' }}">
        <label class="form-label required" for="age">{{ trans('cruds.pet.fields.age') }}</label>
        <input class="form-control" type="number" name="age" id="age" required wire:model.defer="pet.age" step="1">
        <div class="validation-message">
            {{ $errors->first('pet.age') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.age_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.pet_avatar') ? 'invalid' : '' }}">
        <label class="form-label" for="avatar">{{ trans('cruds.pet.fields.avatar') }}</label>
        <x-dropzone id="avatar" name="avatar" action="{{ route('admin.pets.storeMedia') }}" collection-name="pet_avatar" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.pet_avatar') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.avatar_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pet.pet_type_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="pet_type">{{ trans('cruds.pet.fields.pet_type') }}</label>
        <x-select-list class="form-control" required id="pet_type" name="pet_type" :options="$this->listsForFields['pet_type']" wire:model="pet.pet_type_id" />
        <div class="validation-message">
            {{ $errors->first('pet.pet_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.pet_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pet.pet_gender_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="pet_gender">{{ trans('cruds.pet.fields.pet_gender') }}</label>
        <x-select-list class="form-control" required id="pet_gender" name="pet_gender" :options="$this->listsForFields['pet_gender']" wire:model="pet.pet_gender_id" />
        <div class="validation-message">
            {{ $errors->first('pet.pet_gender_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.pet_gender_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.pets.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>