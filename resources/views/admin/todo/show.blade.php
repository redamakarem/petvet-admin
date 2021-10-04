@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.todo.title_singular') }}:
                    {{ trans('cruds.todo.fields.id') }}
                    {{ $todo->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.todo.fields.id') }}
                            </th>
                            <td>
                                {{ $todo->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.todo.fields.title') }}
                            </th>
                            <td>
                                {{ $todo->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.todo.fields.date') }}
                            </th>
                            <td>
                                {{ $todo->date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('todo_edit')
                    <a href="{{ route('admin.todos.edit', $todo) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.todos.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection