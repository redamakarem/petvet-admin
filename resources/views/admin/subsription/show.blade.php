@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.subsription.title_singular') }}:
                    {{ trans('cruds.subsription.fields.id') }}
                    {{ $subsription->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.subsription.fields.id') }}
                            </th>
                            <td>
                                {{ $subsription->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subsription.fields.subscription_user') }}
                            </th>
                            <td>
                                @if($subsription->subscriptionUser)
                                    <span class="badge badge-relationship">{{ $subsription->subscriptionUser->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('subsription_edit')
                    <a href="{{ route('admin.subsriptions.edit', $subsription) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.subsriptions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection