<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('message.sender_id') ? 'invalid' : '' }}">
        <label class="form-label" for="sender">{{ trans('cruds.message.fields.sender') }}</label>
        <x-select-list class="form-control" id="sender" name="sender" :options="$this->listsForFields['sender']" wire:model="message.sender_id" />
        <div class="validation-message">
            {{ $errors->first('message.sender_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.message.fields.sender_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('message.receiver_id') ? 'invalid' : '' }}">
        <label class="form-label" for="receiver">{{ trans('cruds.message.fields.receiver') }}</label>
        <x-select-list class="form-control" id="receiver" name="receiver" :options="$this->listsForFields['receiver']" wire:model="message.receiver_id" />
        <div class="validation-message">
            {{ $errors->first('message.receiver_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.message.fields.receiver_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('message.message_text') ? 'invalid' : '' }}">
        <label class="form-label" for="message_text">{{ trans('cruds.message.fields.message_text') }}</label>
        <input class="form-control" type="text" name="message_text" id="message_text" wire:model.defer="message.message_text">
        <div class="validation-message">
            {{ $errors->first('message.message_text') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.message.fields.message_text_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>