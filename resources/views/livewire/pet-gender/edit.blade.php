<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('petGender.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.petGender.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="petGender.name">
        <div class="validation-message">
            {{ $errors->first('petGender.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.petGender.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.pet-genders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>