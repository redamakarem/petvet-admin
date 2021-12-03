<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('subsription.subscription_user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="subscription_user">{{ trans('cruds.subsription.fields.subscription_user') }}</label>
        <x-select-list class="form-control" required id="subscription_user" name="subscription_user" :options="$this->listsForFields['subscription_user']" wire:model="subsription.subscription_user_id" />
        <div class="validation-message">
            {{ $errors->first('subsription.subscription_user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subsription.fields.subscription_user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.subsriptions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>