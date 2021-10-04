@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.medicalHistory.title_singular') }}:
                    {{ trans('cruds.medicalHistory.fields.id') }}
                    {{ $medicalHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.medicalHistory.fields.id') }}
                            </th>
                            <td>
                                {{ $medicalHistory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.medicalHistory.fields.title') }}
                            </th>
                            <td>
                                {{ $medicalHistory->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.medicalHistory.fields.record_date') }}
                            </th>
                            <td>
                                {{ $medicalHistory->record_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.medicalHistory.fields.record_pet') }}
                            </th>
                            <td>
                                @if($medicalHistory->recordPet)
                                    <span class="badge badge-relationship">{{ $medicalHistory->recordPet->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.medicalHistory.fields.record_user') }}
                            </th>
                            <td>
                                @if($medicalHistory->recordUser)
                                    <span class="badge badge-relationship">{{ $medicalHistory->recordUser->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('medical_history_edit')
                    <a href="{{ route('admin.medical-histories.edit', $medicalHistory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.medical-histories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection