@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.vetLocation.title_singular') }}:
                    {{ trans('cruds.vetLocation.fields.id') }}
                    {{ $vetLocation->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.vetLocation.fields.id') }}
                            </th>
                            <td>
                                {{ $vetLocation->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.vetLocation.fields.name') }}
                            </th>
                            <td>
                                {{ $vetLocation->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('vet_location_edit')
                    <a href="{{ route('admin.vet-locations.edit', $vetLocation) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.vet-locations.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection