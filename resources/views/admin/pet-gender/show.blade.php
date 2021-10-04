@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.petGender.title_singular') }}:
                    {{ trans('cruds.petGender.fields.id') }}
                    {{ $petGender->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.petGender.fields.id') }}
                            </th>
                            <td>
                                {{ $petGender->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.petGender.fields.name') }}
                            </th>
                            <td>
                                {{ $petGender->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('pet_gender_edit')
                    <a href="{{ route('admin.pet-genders.edit', $petGender) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.pet-genders.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection