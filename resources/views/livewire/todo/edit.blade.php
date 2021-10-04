<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('todo.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.todo.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="todo.title">
        <div class="validation-message">
            {{ $errors->first('todo.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.todo.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('todo.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.todo.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="todo.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('todo.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.todo.fields.date_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.todos.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>