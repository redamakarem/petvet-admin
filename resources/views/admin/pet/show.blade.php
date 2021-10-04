@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.pet.title_singular') }}:
                    {{ trans('cruds.pet.fields.id') }}
                    {{ $pet->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.id') }}
                            </th>
                            <td>
                                {{ $pet->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.name') }}
                            </th>
                            <td>
                                {{ $pet->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.age') }}
                            </th>
                            <td>
                                {{ $pet->age }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.avatar') }}
                            </th>
                            <td>
                                @foreach($pet->avatar as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.pet_type') }}
                            </th>
                            <td>
                                @if($pet->petType)
                                    <span class="badge badge-relationship">{{ $pet->petType->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.pet_gender') }}
                            </th>
                            <td>
                                @if($pet->petGender)
                                    <span class="badge badge-relationship">{{ $pet->petGender->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('pet_edit')
                    <a href="{{ route('admin.pets.edit', $pet) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.pets.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection