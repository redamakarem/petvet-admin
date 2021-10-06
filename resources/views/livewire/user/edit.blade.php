<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="validation-message">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.vet_proffesion_id') ? 'invalid' : '' }}">
        <label class="form-label" for="vet_proffesion">{{ trans('cruds.user.fields.vet_proffesion') }}</label>
        <x-select-list class="form-control" id="vet_proffesion" name="vet_proffesion" :options="$this->listsForFields['vet_proffesion']" wire:model="user.vet_proffesion_id" />
        <div class="validation-message">
            {{ $errors->first('user.vet_proffesion_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.vet_proffesion_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.user_avatar') ? 'invalid' : '' }}">
        <label class="form-label" for="avatar">{{ trans('cruds.user.fields.avatar') }}</label>
        <x-dropzone id="avatar" name="avatar" action="{{ route('admin.users.storeMedia') }}" collection-name="user_avatar" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.user_avatar') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.avatar_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.user_certifications') ? 'invalid' : '' }}">
        <label class="form-label" for="certifications">{{ trans('cruds.user.fields.certifications') }}</label>
        <x-dropzone id="certifications" name="certifications" action="{{ route('admin.users.storeMedia') }}" collection-name="user_certifications" max-file-size="2" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.user_certifications') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.certifications_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.years_of_experience') ? 'invalid' : '' }}">
        <label class="form-label" for="years_of_experience">{{ trans('cruds.user.fields.years_of_experience') }}</label>
        <input class="form-control" type="number" name="years_of_experience" id="years_of_experience" wire:model.defer="user.years_of_experience" step="1">
        <div class="validation-message">
            {{ $errors->first('user.years_of_experience') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.years_of_experience_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.current_location_id') ? 'invalid' : '' }}">
        <label class="form-label" for="current_location">{{ trans('cruds.user.fields.current_location') }}</label>
        <x-select-list class="form-control" id="current_location" name="current_location" :options="$this->listsForFields['current_location']" wire:model="user.current_location_id" />
        <div class="validation-message">
            {{ $errors->first('user.current_location_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.current_location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.phone') ? 'invalid' : '' }}">
        <label class="form-label" for="phone">{{ trans('cruds.user.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="user.phone">
        <div class="validation-message">
            {{ $errors->first('user.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.phone_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>