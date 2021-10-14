@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.message.title_singular') }}:
                    {{ trans('cruds.message.fields.id') }}
                    {{ $message->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.message.fields.id') }}
                            </th>
                            <td>
                                {{ $message->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.message.fields.sender') }}
                            </th>
                            <td>
                                @if($message->sender)
                                    <span class="badge badge-relationship">{{ $message->sender->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.message.fields.receiver') }}
                            </th>
                            <td>
                                @if($message->receiver)
                                    <span class="badge badge-relationship">{{ $message->receiver->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.message.fields.message_text') }}
                            </th>
                            <td>
                                {{ $message->message_text }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('message_edit')
                    <a href="{{ route('admin.messages.edit', $message) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection