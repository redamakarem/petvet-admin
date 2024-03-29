<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('vetProffesion.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.vetProffesion.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="vetProffesion.name">
        <div class="validation-message">
            {{ $errors->first('vetProffesion.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vetProffesion.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.vet-proffesions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>