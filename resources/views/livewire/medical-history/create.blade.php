<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('medicalHistory.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.medicalHistory.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="medicalHistory.title">
        <div class="validation-message">
            {{ $errors->first('medicalHistory.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.medicalHistory.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('medicalHistory.record_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="record_date">{{ trans('cruds.medicalHistory.fields.record_date') }}</label>
        <x-date-picker class="form-control" required wire:model="medicalHistory.record_date" id="record_date" name="record_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('medicalHistory.record_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.medicalHistory.fields.record_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('medicalHistory.record_pet_id') ? 'invalid' : '' }}">
        <label class="form-label" for="record_pet">{{ trans('cruds.medicalHistory.fields.record_pet') }}</label>
        <x-select-list class="form-control" id="record_pet" name="record_pet" :options="$this->listsForFields['record_pet']" wire:model="medicalHistory.record_pet_id" />
        <div class="validation-message">
            {{ $errors->first('medicalHistory.record_pet_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.medicalHistory.fields.record_pet_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('medicalHistory.record_user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="record_user">{{ trans('cruds.medicalHistory.fields.record_user') }}</label>
        <x-select-list class="form-control" id="record_user" name="record_user" :options="$this->listsForFields['record_user']" wire:model="medicalHistory.record_user_id" />
        <div class="validation-message">
            {{ $errors->first('medicalHistory.record_user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.medicalHistory.fields.record_user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.medical-histories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>